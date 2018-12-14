<?php
namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;

use App\Models\Project\Cases;
use App\Transformers\Project\CasesTransformer;

class CasesController extends Controller { // 案例
    public function index(Request $request, $flag='') {
        $order_column = $request->query('order_column', 'sort');
        $order_direction = $request->query('order_direction', 'asc');
        $page_size = $request->query('page_size', 10);

        $cases = new Cases;
        switch ( $flag ) {
            case 'arrangement': // 整理
                $cases = $cases->whereNull('arranged_at');
            break;
            // case '':
            // break;
            default:
            break;
        }
        $cases = $cases
            ->orderBy($order_column, $order_direction)
            ->orderBy('id', 'desc')
            ->paginate($page_size);

        return $this->response->paginator($cases, new CasesTransformer);
    }
    public function show($id) {
        $user = Cases::findOrFail($id);
        return $this->response->item($user, new CasesTransformer);
    }
    public function store(Request $request) {
        $user = Cases::create();
    }
    public function update(Request $request, $id) {
        $user = Cases::findOrFail($id);
        $user->update();
    }
    public function destroy($id) {
        $user = Cases::findOrFail($id);
        $result = $user->delete();
        return [
            'result' => $result,
        ];
    }
}
