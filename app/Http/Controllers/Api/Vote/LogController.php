<?php
namespace App\Http\Controllers\Api\Vote;

use Illuminate\Http\Request;

use App\Models\Vote\Log;
use App\Transformers\Vote\LogTransformer;

class LogController extends Controller { // 日志
    public function index($user_id=0, Request $request) {
        $order_column = $request->query('order_column', 'created_at');
        $order_direction = $request->query('order_direction', 'desc');
        $page_size = $request->query('page_size', 20);

        $logs = new Log;
        if ( $user_id ) $logs = $logs->where('user_id', $user_id);
        $logs = $logs
            ->orderBy($order_column, $order_direction)
            ->paginate($page_size);

        return $this->response->paginator($logs, new LogTransformer);
    }
    public function show($id) {
        $log = Log::findOrFail($id);
        return $this->response->item($log, new LogTransformer);
    }
    public function store(Request $request) {
        //
    }
    public function update(Request $request) {
        //
    }
    public function destroy() {
        //
    }
}
