<?php
namespace App\Http\Controllers\Api\Vote;

use Illuminate\Http\Request;

use App\Models\Vote\User;
use App\Transformers\Vote\UserTransformer;

class UserController extends Controller { // 用户
    public function index($page_size=10, $order='vote_count', $order_direction='desc') {
        $users = User::order($order, $order_direction)->paginate($page_size);
        return $this->response->paginator($users, new UserTransformer);
    }
    public function show($id) {
        $user = User::findOrFail($id);
        return $this->response->item($user, new UserTransformer);
    }
    public function store(Request $request) {
        $user = User::create();
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update();
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $result = $user->delete();
        return [
            'result' => $result,
        ];
    }
}
