<?php
// ## Office
Auth::routes();

$router->get('/', 'Procedure\IndexController@index');

// ### Procedure
$router->get('/procedure', 'Procedure\IndexController@index'); // 流程

Route::group(['middleware' => ['auth:admin']], function ($router) {
});
