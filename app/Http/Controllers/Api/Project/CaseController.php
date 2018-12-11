<?php
namespace App\Http\Controllers\Api\Case;

use Illuminate\Http\Request;

use App\Models\Project\Case;
use App\Transformers\Vote\UserTransformer;

class UserController extends Controller { // 用户
    public function index($vote_id=0, Request $request) {
        $order_column = $request->query('order_column', 'vote_count');
        $order_direction = $request->query('order_direction', 'desc');
        $page_size = $request->query('page_size', 10);

        $users = new User;
        if ( $vote_id ) $users = $users->where('vote_id', $vote_id);
        $users = $users
            ->orderBy($order_column, $order_direction)
            ->paginate($page_size);

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
