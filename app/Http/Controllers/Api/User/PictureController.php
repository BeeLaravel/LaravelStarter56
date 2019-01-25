<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;

use App\Models\User\Category;
use App\Models\User\Picture as CurrentModel;
use App\Transformers\User\PictureTransformer as CurrentTransformer;

class PictureController extends Controller { // 案例
    public function index($category='', Request $request) {
        $order_column = $request->query('order_column', 'sort');
        $order_direction = $request->query('order_direction', 'asc');
        $page_size = $request->query('page_size', 10);

        $created_by = $request->query('created_by', 0);

        $category = Category::whereSlug($category)->first();

        $model = new CurrentModel;
        
        $return = $model
            ->whereCreatedBy($created_by)
            ->whereCategoryId($category->id??0)
            ->orderBy($order_column, $order_direction)
            ->orderBy('id', 'desc')
            ->paginate($page_size);

        return $this->response->paginator($return, new CurrentTransformer);
    }
    public function show($id) {
        $item = CurrentModel::findOrFail($id);
        return $this->response->item($item, new CurrentTransformer);
    }
    public function store(Request $request) {
        $item = CurrentModel::create();
    }
    public function update(Request $request, $id) {
        $item = CurrentModel::findOrFail($id);
        $item->update();
    }
    public function destroy($id) {
        $item = CurrentModel::findOrFail($id);
        $result = $item->delete();
        return [
            'result' => $result,
        ];
    }
}
