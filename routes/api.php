<?php
// ## API
// ### 原生
// Route::get('votes', function() { // test
//     return \App\Models\Vote\Vote::all();
// });

// Route::middleware('auth:api')->get('/user', function (\Illuminate\Http\Request $request) {
//     return $request->user();
// });

// ### Dingo API
$api = app('Dingo\Api\Routing\Router');

// $api->version('v1', function ($api) {
	// $api->get('votes', function() { // test
	//     return \App\Models\Vote\Vote::all();
	// });

	// $api->group(['middleware' => ['auth:api']], function ($api) {
	// 	$api->get('/user', function (\Illuminate\Http\Request $request) {
	// 	    return $request->user();
	// 	});
	// });
// });

// ### 其他
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

// $api->version('v1', function ($api) {
//     $api->get('posts', '\App\Http\Controllers\Api\Post\PostController@index');
//     $api->get('post/{id}', '\App\Http\Controllers\Api\Post\PostController@show');
// });

// $api->group(['middleware' => ['auth:api']], function ($api) {
	$api->version('v1', function ($api) { // Vote
	    $api->resource('votes', '\App\Http\Controllers\Api\Vote\VoteController'); // 投票 Vote
	    $api->resource('vote_users', '\App\Http\Controllers\Api\Vote\UserController'); // 用户 User
	    $api->get('votes/{vote_id}/users', '\App\Http\Controllers\Api\Vote\UserController@index');
	    $api->resource('vote_logs', '\App\Http\Controllers\Api\Vote\LogController'); // 日志 Log
	    $api->get('vote_users/{user_id}/logs', '\App\Http\Controllers\Api\Vote\LogController@index');
	});
// });

$api->version('v1', function ($api) {
    $api->post('auth/register', '\App\Http\Controllers\Api\Auth\AuthController@register');
});
