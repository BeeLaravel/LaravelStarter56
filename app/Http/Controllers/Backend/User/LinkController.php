<?php
namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\LinkRequest as CurrentRequest;

use App\Models\User\Category;
use App\Models\User\Link as CurrentModel;

class LinkController extends Controller {
    protected $slug = 'links';

    public function __construct() {}

    public function index(Request $request) {
        $type = $request->input('type', $this->getDefaultType());

        $menus = Category::where('created_by', 0)
            ->where('type', $type)
            ->get();
        $menus = level_array($menus);

    	return view($this->getView(), compact('menus'));
    }
    public function show() {
    	return 'show';
    }
    public function create(Request $request) {
        $type = $request->input('type', $this->getDefaultType());

        $menus = Category::where('created_by', 0)
            ->where('type', $type)
            ->get();
        $menus = level_array($menus);
        $categories = plain_array($menus, 0, "=");

        return view($this->getView(), compact('menus', 'categories'));
    }
    public function store(CurrentRequest $request) {
        $result = CurrentModel::create(array_merge($request->all(), [
            'created_by' => 0,
            'type' => 0,
        ]));

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->getUrl()); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function edit(int $id) {
        $type = $request->input('type', $this->getDefaultType());

        $menus = Category::where('created_by', 0)
            ->where('type', $type)
            ->get();
        $menus = level_array($menus);
        $categories = plain_array($menus, 0, "=");
        $item = CurrentModel::find($id);

        return view($this->getView(), compact('menus', 'categories', 'item'));
    }
    public function update(CurrentRequest $request, int $id) {
    	$item = CurrentModel::find($id);
        $result = $item->update($request->all());

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->getUrl()); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function destroy(Request $request, int $id) {
        $result = CurrentModel::destroy($id);

        if ( $result ) {
            flash('删除成功', 'success');
        } else {
            flash('删除失败', 'error');
        }

        return redirect($this->getUrl());
    }
    // public function test() {
    //     $post = new Post;
    //     $post
    //        ->setTranslation('name', 'en', 'hello')
    //        ->setTranslation('name', 'zh-CN', '你好')
    //        ->save();
           
    //     $post->name;
    //     $post->getTranslation('name', 'zh-CN');

    //     app()->setLocale('zh-CN');

    //     $post->name;
    // }
}
