<?php
namespace App\Http\Controllers\Api\Vote;

use Illuminate\Http\Request;

use App\Models\Vote\Vote;
use App\Transformers\Vote\VoteTransformer;

class VoteController extends Controller { // 投票
    public function index($page_size=10) {
        $votes = Vote::paginate($page_size);
        return $this->response->paginator($votes, new VoteTransformer);
    }
    public function show($id) {
        $vote = Vote::findOrFail($id);
        return $this->response->item($vote, new VoteTransformer);
    }
    public function store(Request $request) {
        //
    }
    public function update(Request $request, Vote $vote) {
        //
    }
    public function destroy(Vote $vote) {
        //
    }
}
