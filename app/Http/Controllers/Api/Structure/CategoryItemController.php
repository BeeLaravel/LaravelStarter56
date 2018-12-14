<?php
namespace App\Http\Controllers\Api\Structure;

use Illuminate\Http\Request;

use App\Models\Structure\CategoryItem;
use App\Transformers\Structure\CategoryItemTransformer;

class CategoryItemController extends Controller { // 案例
    public function index(Request $request, $parent_id=0) {
        $order_column = $request->query('order_column', 'sort');
        $order_direction = $request->query('order_direction', 'asc');
        $page_size = $request->query('page_size', 10);

        $category_items = new CategoryItem;

        if ( $parent_id ) $category_items = $category_items->where('parent_id', $parent_id);
  
        $category_items = $category_items
            ->orderBy($order_column, $order_direction)
            ->orderBy('id', 'desc')
            ->paginate($page_size);

        return $this->response->paginator($category_items, new CategoryItemTransformer);
    }
    public function show($id) {
        $category_item = CategoryItem::findOrFail($id);

        return $this->response->item($category_item, new CategoryItemTransformer);
    }
    public function store(Request $request) {
        $category_item = CategoryItem::create();
    }
    public function update(Request $request, $id) {
        $category_item = CategoryItem::findOrFail($id);
        $category_item->update();
    }
    public function destroy($id) {
        $category_item = CategoryItem::findOrFail($id);
        $result = $category_item->delete();

        return [
            'result' => $result,
        ];
    }
}
