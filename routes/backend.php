<?php
// ## Backend
Auth::routes();

Route::group([
	'middleware' => ['auth:backend']
], function ($router) {
	$router->resource('links', 'User\LinkController'); // 链接
});
