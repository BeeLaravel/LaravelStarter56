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

        $menus = Category::where('created_by', 0)
            ->where('type', $type)
            ->get();
        $menus = level_array($menus);
        array_unshift($menus, new Category);

        $category = Category::whereSlug($category)->first();
        $pictures = CurrentModel::whereCreatedBy(0)
            ->whereCategoryId($category->id??0)
            ->get();

    	return view($this->getView(), compact('menus', 'category', 'pictures'));
    }
    public function show() {
    	return 'show';
    }
    public function create() {
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

            return redirect($this->getUrl());
        } else {
            flash('操作失败', 'error');

            return back();
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
