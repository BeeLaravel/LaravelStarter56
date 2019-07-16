<?php
namespace App\Http\Controllers\Admin\User;

use App\Models\User\MenuItem;

use Illuminate\Http\Request;
use App\Http\Requests\User\MenuItemRequest;

class MenuItemController extends Controller {
    private $show = [
        'id',
        'title',
        'slug',
        'sort',
        'created_at',
        'updated_at',
    ];

    public function index($menu_id, Request $request) {
        $menu_item_array = MenuItem::whereMenuId($menu_id)->get();
        $this->sortList($menu_item_array, 0, $menu_items);

        return view('admin.user.menu_item.index', compact('menu_items', 'menu_id'));
    }
    protected function sortList($data, $id=0, &$arr=[]) {
        foreach ( $data as $item ) {
            if ( $id == $item->parent_id ) {
                $item->button = $item->getActionButtons('menu_items');

                $arr[] = $item->toArray();
                $this->sortList($data, $item->id, $arr);
            }
        }

        return $arr;
    }
    public function create($menu_id, Request $request) {
        $menu_item_array = MenuItem::whereMenuId($menu_id)->get();
        $menu_items = level_array($menu_item_array);
        $menu_items = plain_array($menu_items, 0, '==');

        return view('admin.user.menu_item.create', compact('menu_items', 'menu_id'));
    }
    public function store(MenuItemRequest $request) {
        $result = MenuItem::create(array_merge($request->all(), [
            'created_by' => auth('admin')->user()->id
        ]));

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/menus/'.$result->menu_id); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function show(int $id) {
        return 'user menu_item show';
    }
    public function edit(int $id) {
        $item = MenuItem::find($id);

        $menu_item_array = MenuItem::whereMenuId($item->menu_id)->get();
        $menu_items = level_array($menu_item_array);
        $menu_items = plain_array($menu_items, 0, '==');

        return view('admin.user.menu_item.edit', compact('menu_items', 'item'));
    }
    public function update(MenuItemRequest $request, int $id) {
        $menu = MenuItem::find($id);
        $result = $menu->update($request->all());

        if ( $result ) {
            flash('操作成功', 'success');

            return redirect('/admin/menus/'.$menu->menu_id); // 列表
        } else {
            flash('操作失败', 'error');

            return back(); // 继续
        }
    }
    public function destroy(Request $request, int $id) {
        $item = MenuItem::find($id);
        $result = MenuItem::destroy($id);

        if ( $result ) {
            flash('删除成功', 'success');
        } else {
            flash('删除失败', 'error');
        }

        return redirect('admin/menus/'.$item->menu_id);
    }
}
