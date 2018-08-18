<?php
// ## Front
Auth::routes();

// bbs
Route::get('bbs', 'BBS\PageController@root')->name('front.bbs.root');

