<?php
// ## Admin
Auth::routes(); // Route:auth();

Route::group([
	'middleware' => ['auth:admin']
], function ($router) {
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
	$router->resource('/', 'User\CategoryController'); // 首页 分类
	// ### RBAC
	$router->resource('permissions', 'RBAC\PermissionController'); // 结点
	$router->resource('roles', 'RBAC\RoleController'); // 角色
	$router->resource('administrators', 'RBAC\UserController'); // 用户
	// ### 架构
	$router->get('corporation/export', 'Architecture\CorporationController@export'); // 导出
	$router->get('corporation/download/{type}', 'Architecture\CorporationController@download'); // 下载
	$router->resource('corporations', 'Architecture\CorporationController'); // 公司
	$router->resource('sites', 'Architecture\SiteController'); // 站点
	$router->resource('departments', 'Architecture\DepartmentController'); // 部门
	// ### 用户信息
	
	// ### 用户
	$router->resource('menus', 'User\MenuController', ['except' => ['show']]); // 菜单
	$router->get('menus/{menu_id}', 'User\MenuItemController@index'); // 菜单项 列表
	$router->resource('menu_items', 'User\MenuItemController', ['except' => ['index', 'create']]); // 菜单项
	$router->get('menu_items/create/{menu_id}', 'User\MenuItemController@create'); // 菜单项 创建
	$router->resource('categories', 'User\CategoryController'); // 分类
	$router->resource('tags', 'User\TagController'); // 标签
	$router->resource('links', 'User\LinkController'); // 链接
	$router->resource('pictures', 'User\PictureController'); // 图片
	$router->resource('posts', 'User\PostController'); // 文章
	$router->resource('pages', 'User\PageController'); // 页面

	// ### 工具
	$router->get('compile/index', 'Tool\CompileController@index');
});
