<?php

// blog
Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// Route::get('/', 'Front\Blog\IndexController@index')->name('front.blog.index');
// cms
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');
// Route::get('/', 'Front\CMS\IndexController@index')->name('front.cms.index');

// ### Starter
// #### vue
Route::get('/vue', 'Starter\Vue\IndexController@index')->name('starter.vue.index');
### vue element
Route::get('/element', 'Starter\Element\IndexController@index')->name('starter.element.index');
### vue mint-ui
Route::get('/mintui', 'Front\MintUi\IndexController@index')->name('starter.mintui.index');

Auth::routes();