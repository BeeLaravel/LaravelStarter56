<?php
// ## Backend
Auth::routes();

Route::group([
	'middleware' => ['auth:backend']
], function ($router) {
	$router->resource('/', 'User\LinkController'); // 链接
	$router->resource('links', 'User\LinkController'); // 链接
	$router->get('pictures/category/{category}', 'User\PictureController@index')->name('pictures.index');
	$router->resource('pictures', 'User\PictureController'); // 图片
});
