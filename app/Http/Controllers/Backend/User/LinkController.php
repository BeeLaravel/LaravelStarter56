<?php
namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\LinkRequest;

use App\Models\User\Category;
use App\Models\User\Link;

class LinkController extends Controller {
    public function __construct() {
    }
    public function index() {
        $menus = Category::where('created_by', 0)
            ->where('type', 'hospital')
            ->get();
        $menus = level_array($menus);

    	return view('backend.link.index', compact('menus'));
    }
    public function show() {
    	return 'show';
    }
    public function create() {
        $menus = Category::where('created_by', 0)
            ->where('type', 'hospital')
            ->get();
        $menus = level_array($menus);
        $categories = plain_array($menus, 0, "=");

        return view('backend.link.create', compact('menus', 'categories'));
    }
    public function store(LinkRequest $request) {
        $result = Link::create(array_merge($request->all(), [
            'created_by' => 0,
            'type' => 0,
        ]));

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/backend/links'); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function edit(int $id) {
        $menus = Category::where('created_by', 0)
            ->where('type', 'hospital')
            ->get();
        $menus = level_array($menus);
        $categories = plain_array($menus, 0, "=");
        $link = Link::find($id);

        return view('backend.link.edit', compact('menus', 'categories', 'link'));
    }
    public function update(LinkRequest $request, int $id) {
    	$item = Link::find($id);
        $result = $item->update($request->all());

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/backend/links'); // 列表
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

        return redirect('backend/links');
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
