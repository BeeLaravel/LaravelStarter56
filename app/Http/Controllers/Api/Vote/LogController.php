<?php
namespace App\Http\Controllers\Api\Vote;

use Illuminate\Http\Request;

use App\Models\Vote\Log;
use App\Transformers\Vote\LogTransformer;

class LogController extends Controller { // 日志
    public function index($page_size=20) {
        $logs = Log::paginate($page_size);
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
