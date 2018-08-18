<?php

namespace App\Http\Controllers\Admin\Link;

use App\Models\Link\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\Link\TagRequest;

class LinkTagController extends Controller
{
    public function index(Request $request)
    {
        if ( $request->ajax() ) {
            $draw = $request->input('draw', 1);
            $start = $request->input('start', 0);
            $length = $request->input('length', 20);

            $order['name'] = $request->input('columns.' .$request->input('order.0.column') . '.name', 'id'); // 排序字段
            $order['dir'] = $request->input('order.0.dir', 'desc'); // 升降序
            $search['value'] = $request->input('search.value', ''); // 搜索字段
            $search['regex'] = $request->input('search.regex', false); // 是否正则

            $model = new Tag();
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
                    $item->button = $item->getActionButtons('linktag');
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

            return view('admin.link.tag.index', compact('search', 'tags'));
        }
    }
    public function create()
    {
        $tags = Tag::get();

        $tags = level_array($tags);
        $tags = plain_array($tags, 0, "==");

        return view('admin.link.tag.create', compact('tags'));
    }
    public function store(Request $request)
    {
        $result = Tag::create($request->all());
        // $result->user_id = auth()->user()->id;

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/linktag'); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function show(int $id)
    {
        return 'linktag show';
    }
    public function edit(int $id)
    {
        $tags = Tag::get();

        $tags = level_array($tags);
        $tags = plain_array($tags, 0, "==");

        $tag = Tag::find($id);

        return view('admin.link.tag.edit', compact('tags', 'tag'));
    }
    public function update(Request $request, int $id)
    {
        $tag = Tag::find($id);
        $result = $tag->update($request->all());

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/linktag'); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function destroy(Request $request, int $id)
    {
        $result = Tag::destroy($id);

        if ( $result ) {
            flash('删除成功', 'success');
        } else {
            flash('删除失败', 'error');
        }

        return redirect('admin/linktag');
    }
}
