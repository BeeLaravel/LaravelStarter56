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

Route::group([
	'prefix' => 'image'
], function ($router) {
	Route::group([
		'prefix' => 'dropzone'
	], function ($router) {
		Route::get('/', ['as' => 'upload', 'uses' => 'Resource\ImageController@getUpload']);
		Route::get('example-2', ['as' => 'upload-2', 'uses' => 'Resource\ImageController@getServerImagesPage']);
		Route::get('example-3', ['as' => 'upload-3', 'uses' => 'Resource\ImageController@getUpload3']);

		Route::post('upload', ['as' => 'upload-post', 'uses' =>'Resource\ImageController@postUpload']);
		Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'Resource\ImageController@deleteUpload']);
		Route::get('server-images', ['as' => 'server-images', 'uses' => 'Resource\ImageController@getServerImages']);
	});
});

Route::group([ // 案例
	'prefix' => 'case'
], function ($router) {
	Route::get('/', ['as' => 'case', 'uses' => 'Project\Cases\IndexController@index']);
});
