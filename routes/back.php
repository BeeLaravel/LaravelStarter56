<?php
// ## Back
Route::group([
	'prefix' => 'core'
], function ($router) {
	$router->get('/', 'CoreController@index');
	$router->get('charts', 'CoreController@charts');
	$router->get('widgets', 'CoreController@widgets');

	$router->get('login', 'CoreController@login');
	$router->get('register', 'CoreController@register');

	$router->get('404', 'CoreController@h404');
	$router->get('500', 'CoreController@h500');

	$router->get('font-awesome', 'CoreController@fontAwesome');
	$router->get('simple-line-icons', 'CoreController@simpleLineIcons');
	
	$router->get('buttons', 'CoreController@buttons');
	$router->get('social-buttons', 'CoreController@socialButtons');
	$router->get('cards', 'CoreController@cards');
	$router->get('forms', 'CoreController@forms');
	$router->get('modals', 'CoreController@modals');
	$router->get('switches', 'CoreController@switches');
	$router->get('tables', 'CoreController@tables');
	$router->get('tabs', 'CoreController@tabs');
});