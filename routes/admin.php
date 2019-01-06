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

// ### 个人
Route::group([
	'prefix' => 'profile',
	// 'middleware' => ['auth:admin']
], function ($router) {
	$router->get('/', 'Profile\IndexController@profile'); // 编辑资料
	$router->get('configures', 'Profile\IndexController@configures'); // 个人配置
	$router->get('avatar', 'Profile\IndexController@avatar'); // 修改头像
	$router->get('password', 'Profile\IndexController@password'); // 修改密码

	$router->patch('/', 'Profile\IndexController@updateProfile'); // 编辑资料
	$router->patch('configures', 'Profile\IndexController@updateConfigures'); // 个人配置
	$router->patch('avatar', 'Profile\IndexController@updateAvatar'); // 修改头像
	$router->patch('password', 'Profile\IndexController@updatePassword'); // 修改密码
});

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


