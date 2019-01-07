<?php
// ## Backend
Auth::routes();

// Route::group(['middleware' => ['auth:admin']], function ($router) {
// });

$router->resource('links', 'User\LinkController'); // 链接