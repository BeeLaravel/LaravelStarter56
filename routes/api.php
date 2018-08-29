<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api = app('Dingo\Api\Routing\Router');

// $api->version('v1', function ($api) {
//     $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
// });
// $api->version('v2', function ($api) {
//     $api->get('users/{id}', 'App\Api\V2\Controllers\UserController@show');
// });

// $api->get('users/{id}', ['as' => 'users.index', 'uses' => 'Api\V1\UserController@show']);

// $api->version('v1', function ($api) {
//     $api->get('users/{id}', 'App\Http\Controllers\Api\Other\SlugController@slug');
// });

// app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('users.index');

$api->version('v1', function ($api) {
    $api->get('posts', '\App\Http\Controllers\Api\Post\PostController@index');
    $api->get('post/{id}', '\App\Http\Controllers\Api\Post\PostController@show');
});