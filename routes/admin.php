<?php
// ## Admin
Auth::routes();
// ### 链接
$router->resource('linktag', 'Link\LinkTagController'); // 链接标签
$router->resource('link', 'Link\LinkController'); // 链接
// ### 文章
$router->resource('posttag', 'Post\PostTagController'); // 文章标签
$router->resource('post', 'Post\PostController'); // 文章

// ### 工具
$router->get('compile/index', 'Tool\CompileController@index');

Route::group(['middleware' => ['auth:admin']], function ($router) {
});


