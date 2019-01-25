<?php
// ## Front
Auth::routes();

// bbs
Route::get('bbs', 'BBS\PageController@root')->name('front.bbs.root');

Route::group([
	'prefix' => 'links'
], function ($router) {
	Route::get('/', ['as' => 'link', 'uses' => 'Link\IndexController@index']);
});