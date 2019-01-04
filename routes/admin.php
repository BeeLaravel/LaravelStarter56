<?php
// ## Admin
Auth::routes();

// ### RBAC
$router->get('/corporation/export', 'RBAC\CorporationController@export'); // 导出
$router->get('/corporation/download/{type}', 'RBAC\CorporationController@download'); // 下载
$router->resource('corporation', 'RBAC\CorporationController'); // 公司
$router->resource('permission', 'RBAC\PermissionController'); // 权限
$router->resource('role', 'RBAC\RoleController'); // 角色
$router->resource('admin', 'RBAC\UserController'); // 用户

// ### 用户
$router->resource('categories', 'User\CategoryController'); // 分类
$router->resource('tags', 'User\TagController'); // 标签
$router->resource('links', 'User\LinkController'); // 链接
// ### 链接
$router->resource('linktag', 'Link\LinkTagController'); // 链接标签
// ### 文章
$router->resource('posttag', 'Post\PostTagController'); // 文章标签
$router->resource('posts', 'Post\PostController'); // 文章

// ### 工具
$router->get('compile/index', 'Tool\CompileController@index');

Route::group(['middleware' => ['auth:admin']], function ($router) {
});


