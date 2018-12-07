<?php
// blog
// Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// cms
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');

// ### Starter
// #### vue
Route::group([
	'domain' => 'laravelvue.{main_domain}.{top_domain}'
], function ($router) {
	Route::get('/', 'Starter\Vue\IndexController@index')->name('starter.vue.index');
});
// #### vue element
Route::group([
	'domain' => 'laravelelement.{main_domain}.{top_domain}'
], function ($router) {
	Route::get('/', 'Starter\Element\IndexController@index')->name('starter.element.index');
});
// #### vue mint-ui
Route::group([
	'domain' => 'laravelmint.{main_domain}.{top_domain}'
], function ($router) {
	Route::get('/', 'Starter\Mint\IndexController@index')->name('starter.mint.index');
});

Auth::routes();
