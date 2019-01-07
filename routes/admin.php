<?php
// ## Admin
Auth::routes();

Route::group(['middleware' => ['auth:admin']], function ($router) {
	// ### 个人
	Route::group([
		'prefix' => 'profile',
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
	$router->resource('posts', 'User\PostController'); // 文章
	$router->resource('pages', 'User\PageController'); // 页面

	// ### 工具
	$router->get('compile/index', 'Tool\CompileController@index');
});
