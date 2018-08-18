<?php

namespace App\Http\Controllers\Api\Other;

use Illuminate\Http\Request;

/**
 * 标识生成器
 *
 * @Resource("Slug", uri="/slug")
 */
class SlugController extends Controller
{
    /**
     * Laravel 框架自身提供的 Slug 转换
     * 辅助函数 str_slug
     * 类方法 Str::slug
     *
     * @Post(/slug)
     * @Version({"v1"})
     * @Request("title=BeeSoft", contentType="application/x-www-form-urlencoded")
     * @Response(200, body={"id": 10, "username": "foo"})
     * @Transaction({
     *     @Request({"username": "foo", "password": "bar"}),
     *     @Response(200, body={"id": 10, "username": "foo"}),
     *     @Response(422, body={"error": {"username": {"Username is already taken."}}})
     * })
     * @Parameters({
     *      @Parameter("page", description="The page of results to view.", default=1),
     *      @Parameter("limit", description="The amount of results per page.", default=10)
     * })
     * @return \Illuminate\Http\Response
     */
    public function slug()
    {
        return str_slug();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slug_zh(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
