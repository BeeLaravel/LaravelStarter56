<?php
namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\PictureRequest as CurrentRequest;

use App\Models\User\Category;
use App\Models\User\Picture as CurrentModel;

class PictureController extends Controller {
    protected $slug = 'pictures';

    public function __construct() {}

    public function index($category='', Request $request) {
        $type = $request->input('type', $this->getDefaultType());
        $page_size = $request->query('page_size', 10);

        $menus = Category::where('created_by', 0)
            ->where('type', $type)
            ->get();
        $menus = level_array($menus);
        array_unshift($menus, new Category);

        $category = Category::whereSlug($category)->first();
        $picture_count = CurrentModel::whereCreatedBy(0)
            ->whereCategoryId($category->id??0)
            ->count();
        $page_count = ceil($picture_count / $page_size);

    	return view($this->getView(), compact('menus', 'category', 'page_count'));
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
        $image_path = $request->file('image')->store('public/pictures');

        $result = CurrentModel::create(array_merge($request->all(), [
            'created_by' => 0,
            'type' => 'default',
            'image' => substr($image_path, '7'),
        ]));

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->getUrl('category/'.$result->category->slug??'default'));
        } else {
            flash('操作失败', 'error');

            return back();
        }
    }
    public function edit(int $id, Request $request) {
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

        $data = $request->all();
        if ( $image = $request->file('image') ) {
            $image_path = $image->store('public/pictures');
            $data['image'] = substr($image_path, '7');
        } else {
            unset($data['image']);
        }
        $result = $item->update($data);

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect($this->getUrl());
        } else {
            flash('操作失败', 'error');

            return back();
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
}
