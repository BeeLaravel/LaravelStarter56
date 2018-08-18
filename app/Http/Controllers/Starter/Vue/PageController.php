<?php

namespace App\Http\Controllers\Front\BBS;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function root()
    {
        return view('front.bbs.page.root');
    }
    public function create()
    {
        echo "Front/BBS/Page/crate";
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Post $post)
    {
        //
    }
    public function edit(Post $post)
    {
        //
    }
    public function update(Request $request, Post $post)
    {
        //
    }
    public function destroy(Post $post)
    {
        //
    }
}
