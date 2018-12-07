<?php
namespace App\Http\Controllers\Starter\Mint;

use Illuminate\Http\Request;

class IndexController extends Controller {
    public function root() {
        return view('front.bbs.page.root');
    }
    public function index() {
    }
    public function store(Request $request) {
        //
    }
    public function show(Post $post) {
        //
    }
    public function edit(Post $post) {
        //
    }
    public function update(Request $request, Post $post) {
        //
    }
    public function destroy(Post $post) {
        //
    }
}
