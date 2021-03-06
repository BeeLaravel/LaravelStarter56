<?php
namespace App\Http\Controllers\Admin\Application;

use App\Models\Application\Picture;
use App\Models\Category\Category;
use App\Models\Category\Tag;

use Illuminate\Http\Request;
use App\Http\Requests\Application\PictureRequest as ThisRequest;

class PictureController extends Controller {
    private $baseInfo = [
        'slug' => 'pictures',
        'title' => '图片',
        'description' => '图片列表',
        'link' => '/admin/pictures',
        'parent_title' => '应用',
        'parent_link' => '/admin/pictures',
        'view_path' => 'admin.application.picture.',
    ];
    private $show = [
        'id',
        'title',
        'type',
        'url',
        'created_at',
        'updated_at',
    ];

    public function index(Request $request) {
        if ( $request->ajax() ) {
            $draw = $request->input('draw', 1);
            $start = $request->input('start', 0);
            $length = $request->input('length', 20);

            $order['name'] = $request->input('columns.' .$request->input('order.0.column') . '.name', 'id'); // 排序字段
            $order['dir'] = $request->input('order.0.dir', 'desc'); // 升降序
            $search['value'] = $request->input('search.value', ''); // 搜索字段
            $search['regex'] = $request->input('search.regex', false); // 是否正则

            $model = Picture::where('created_by', auth('admin')->user()->id);

            // # 搜索
            $columns = $request->input('columns');
            foreach ( $columns as $key => $value ) { // 字段搜索
                if ( $value['search']['value'] ) {
                    switch ( $key ) {
                        default:
                            if ( $value['search']['value'] ) { // 有内容
                                if ( $value['search']['regex']=='true' ) { // 正则
                                    $model = $model->where($this->show[$key], 'like', "%{$value['search']['value']}%");
                                } else { // 普通
                                    $model = $model->where($this->show[$key], $value['search']['value']);
                                }
                            }
                    }
                }
            }

            if ( $search['value'] ) { // 搜索
                if ( $search['regex'] == 'true' ) { // 正则匹配
                    $model = $model->where('url', 'like', "%{$search['value']}%")
                        ->orWhere('title', 'like', "%{$search['value']}%")
                        ->orWhere('description', 'like', "%{$search['value']}%");
                } else { // 完全匹配
                    $model = $model->where('url', $search['value'])
                        ->orWhere('title', $search['value'])
                        ->orWhere('description', $search['value']);
                }
            }

            $count = $model->count(); // 总数
            $model = $model->orderBy($order['name'], $order['dir']); // 排序
            $model = $model->offset($start)->limit($length)->get(); // 分页

            if ( $model ) {
                foreach ( $model as $item ) {
                    $item->button = $item->getActionButtons($this->baseInfo['slug']);
                    $item->image = '<a href="/storage/'.$item->image.'" target="__black"><img src="/storage/'.$item->image.'" style="height: 100px; display: block; margin: 0 auto;"></a>';
                }
            }

            return [
                'draw' => $draw,
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $model,
            ];
        } else {
            $types = auth('admin')->user()->profile->pictures;
            $types = json_decode($types, true);

            $search = [];

            return view($this->baseInfo['view_path'].'index', array_merge($this->baseInfo, compact('types', 'search')));
        }
    }
    public function create(Request $request) {
        $types = auth('admin')->user()->profile->pictures;
        $types = json_decode($types, true);

        $category_array = Category::where('created_by', auth('admin')->user()->id)->whereIn('type', ['commons', 'pictures'])->get();
        $categories = level_array($category_array);
        $categories = plain_array($categories, 0, '==');

        $tags = Tag::where('created_by', auth('admin')->user()->id)->whereIn('type', ['commons', 'pictures'])->pluck('title');
        $tags = json_encode($tags);

        return view($this->baseInfo['view_path'].'create', array_merge($this->baseInfo, compact('types', 'categories', 'tags')));
    }
    public function store(ThisRequest $request) {
        // $path = $request->file('avatar')->store('avatars'); // 文件上传
        // $path = $request->file('avatar')->store( // 指定磁盘
        //     'avatars/'.$request->user()->id, 's3'
        // );
        // $path = Storage::putFile('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->storeAs(
        //     'avatars', $request->user()->id
        // );
        // $path = Storage::putFileAs(
        //     'avatars', $request->file('avatar'), $request->user()->id
        // );
        // Storage::put('file.jpg', $contents, 'public'); // 保存指定可见性
        // $visibility = Storage::getVisibility('file.jpg'); // 获取可见性
        // Storage::setVisibility('file.jpg', 'public'); // 设置可见性

        // Storage::delete('file.jpg'); // 删除文件
        // Storage::delete(['file1.jpg', 'file2.jpg']);

        $image_path = $request->file('image')->store('public/pictures');

        $result = Picture::create(array_merge($request->all(), [
            'created_by' => auth('admin')->user()->id,
            'image' => substr($image_path, '7'),
        ]));

        if ( $result ) {
            $tags = $request->input('tags', []);
            $exist_tags = Tag::where('created_by', auth('admin')->user()->id)
                ->whereIn('type', ['commons', 'pictures'])
                ->whereIn('title', $tags)
                ->pluck('title', 'id')->toArray();
            $not_exist_tags = array_diff($tags, $exist_tags);

            if ( $not_exist_tags ) {
                $temp = [];
                foreach ( $not_exist_tags as $tag ) {
                    $temp[] = [
                        'title' => $tag,
                        'slug' => str_slug($tag),
                        'type' => 'commons',
                        'description' => $tag,
                        'created_by' => auth('admin')->user()->id,
                    ];
                }
                $create_result = Tag::insert($temp);
            }

            if ( $tags ) {
                $tags = Tag::where('created_by', auth('admin')->user()->id)
                    ->whereIn('type', ['commons', 'pictures'])
                    ->whereIn('title', $tags)
                    ->pluck('id')->toArray();
                $tags = array_combine($tags, array_fill(0, count($tags), ['table' => 'pictures']));
                $result->tags()->attach($tags);
            }
        }

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->baseInfo['link']);
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function show(int $id) {}
    public function edit(int $id) {
        $types = auth('admin')->user()->profile->pictures;
        $types = json_decode($types, true);

        $category_array = Category::where('created_by', auth('admin')->user()->id)->get();
        $categories = level_array($category_array);
        $categories = plain_array($categories, 0, '==');

        $tags = Tag::where('created_by', auth('admin')->user()->id)->whereIn('type', ['commons', 'pictures'])->pluck('title');
        $tags = json_encode($tags);

        $item = Picture::with('tags')->find($id);

        return view($this->baseInfo['view_path'].'edit', array_merge($this->baseInfo, compact('types', 'categories', 'tags', 'item')));
    }
    public function update(ThisRequest $request, int $id) {
        $item = Picture::find($id);

        $data = $request->all();
        if ( $image = $request->file('image') ) {
            $image_path = $image->store('public/pictures');
            $data['image'] = substr($image_path, '7');
        } else {
            unset($data['image']);
        }
        $result = $item->update($data);

        if ( $result ) {
            $tags = $request->input('tags', []);
            $exist_tags = Tag::where('created_by', auth('admin')->user()->id)
                ->whereIn('type', ['commons', 'pictures'])
                ->whereIn('title', $tags)
                ->pluck('title', 'id')->toArray();
            $not_exist_tags = array_diff($tags, $exist_tags);

            if ( $not_exist_tags ) {
                $temp = [];
                foreach ( $not_exist_tags as $tag ) {
                    $temp[] = [
                        'title' => $tag,
                        'slug' => str_slug($tag),
                        'type' => 'commons',
                        'description' => $tag,
                        'created_by' => auth('admin')->user()->id,
                    ];
                }
                $create_result = Tag::insert($temp);
            }

            if ( $tags ) {
                $tags = Tag::where('created_by', auth('admin')->user()->id)
                    ->whereIn('type', ['commons', 'pictures'])
                    ->whereIn('title', $tags)
                    ->pluck('id')->toArray();
                $tags = array_combine($tags, array_fill(0, count($tags), ['table' => 'pictures']));
                $item->tags()->detach();
                $item->tags()->attach($tags);
            }
        }

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->baseInfo['link']); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function destroy(Request $request, int $id) {
        $result = Picture::destroy($id);

        if ( $result ) {
            flash('删除成功', 'success');
        } else {
            flash('删除失败', 'error');
        }

        return redirect($this->baseInfo['link']);
    }
}
