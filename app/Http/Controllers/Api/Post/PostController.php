<?php

namespace App\Http\Controllers\Api\Post;

// ### 引用
// #### 请求
use Illuminate\Http\Request;
// #### 模型
use App\Models\Post\Post;
// #### 资源
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new PostCollection(Post::all());
        return new PostCollection(Post::paginate())
            ->additional(['meta' => [
                'key' => 'value',
            ]])
            ->response()
            ->header('X-Value', 'True');;
        // return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::findOrNew($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
