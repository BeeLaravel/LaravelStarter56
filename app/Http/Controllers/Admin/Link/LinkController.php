<?php
namespace App\Http\Controllers\Admin\Link;

use App\Models\Link\Link;
use App\Models\Link\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\Link\LinkRequest;

class LinkController extends Controller {
    public function index(Request $request) {
        if ( $request->ajax() ) {
            $draw = $request->input('draw', 1);
            $start = $request->input('start', 0);
            $length = $request->input('length', 20);

            $order['name'] = $request->input('columns.' .$request->input('order.0.column') . '.name', 'id'); // 排序字段
            $order['dir'] = $request->input('order.0.dir', 'desc'); // 升降序
            $search['value'] = $request->input('search.value', ''); // 搜索字段
            $search['regex'] = $request->input('search.regex', false); // 是否正则

            $model = new Link();
            // # 搜索
            $columns = $request->input('columns');
            foreach ( $columns as $key => $value ) { // 字段搜索
                if ( $value['search']['value'] ) {
                    switch ( $key ) {
                        case 3: // parent_id
                            $model = $model->where('parent_id', $value['search']['value']);
                        break;
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
                    $model = $model->where('slug', 'like', "%{$search['value']}%")
                        ->orWhere('title', 'like', "%{$search['value']}%")
                        ->orWhere('description', 'like', "%{$search['value']}%");
                } else { // 完全匹配
                    $model = $model->where('slug', $search['value'])
                        ->orWhere('title', $search['value'])
                        ->orWhere('description', $search['value']);
                }
            }

            $count = $model->count(); // 总数
            $model = $model->orderBy($order['name'], $order['dir']); // 排序
            $model = $model->offset($start)->limit($length)->get(); // 分页

            if ( $model ) {
                foreach ( $model as $item ) {
                    $item->parent_name = $item->parent_id ? $item->parent->title : '顶级';
                    $item->user_name = $item->user_id ? $item->user->name : '未知';
                    $item->button = $item->getActionButtons('link');
                }
            }

            return [
                'draw' => $draw,
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $model,
            ];
        } else {
            $search = [
                'parent_id' => 0,
            ];
            $tags = Tag::pluck('title', 'id');

            return view('admin.link.link.index', compact('search', 'tags'));
        }
    }
    public function create() {
        $types = Link::$types;

        // $tags = Tag::get();
        // $tags = level_array($tags);
        // $tags = plain_array($tags, 0, "==");
        
        $tags = Tag::pluck('title');
        $tags = json_encode($tags);

        return view('admin.link.link.create', compact('types', 'tags'));
    }
    public function store(LinkRequest $request) {
        $result = Link::create($request->all());
        // $result->user_id = auth()->user()->id;

        if ( $result ) {
            $tags = $request->input('tags');
            log_file($tags);
            $exist_tags = Tag::where('title', 'in', $tags)->pluck('title', 'id');
            log_file($exist_tags, 'exist_tags');
            $not_exist_tags = array_diff($tags, $exist_tags);
            log_file($not_exist_tags, 'not_exist_tags');

            if ( $not_exist_tags ) {
                $temp = [];
                foreach ( $not_exist_tags as $tag ) {
                    $temp[] = [
                        'slug' => str_slug($tag),
                        'title' => $tag,
                        'user_id' => 0, // todo user_id slug
                    ];
                }
                $create_result = Tag::create($temp);
                log_file($create_result);
            }

            
        }

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/link'); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function show(int $id) {
        return 'link show';
    }
    public function edit(int $id) {
        $types = Link::$types;

        // $tags = Tag::get();
        // $tags = level_array($tags);
        // $tags = plain_array($tags, 0, "==");

        $tags = Tag::pluck('title');
        $tags = json_encode($tags);

        $link = Link::find($id);

        return view('admin.link.link.edit', compact('types', 'tags', 'link'));
    }
    public function update(LinkRequest $request, int $id) {
        $link = Link::find($id);
        $result = $link->update($request->all());

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/link'); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function destroy(Request $request, int $id) {
        $result = Link::destroy($id);

        if ( $result ) {
            flash('删除成功', 'success');
        } else {
            flash('删除失败', 'error');
        }

        return redirect('admin/link');
    }
}
