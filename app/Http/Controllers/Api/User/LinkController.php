<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;

use App\Models\User\Link as CurrentModel;
use App\Transformers\User\LinkTransformer as CurrentTransformer;

class LinkController extends Controller { // 案例
    public function index(Request $request, $flag='') {
        $order_column = $request->query('order_column', 'sort');
        $order_direction = $request->query('order_direction', 'asc');
        $page_size = $request->query('page_size', 10);

        $model = new CurrentModel;
        switch ( $flag ) {
            case 'arrangement': // 整理
                $model = $model->whereNull('arranged_at');
            break;
            default:
            break;
        }
        $return = $model
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
