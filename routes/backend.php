<?php
// ## Backend
Auth::routes();

// Route::group(['middleware' => ['auth:admin']], function ($router) {
// });

$router->resource('link', 'Link\LinkController'); // 链接