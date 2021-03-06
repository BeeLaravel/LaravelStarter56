<?php
return [
    'domain' => env('BEESOFT_DOMAIN', 'BeeSoft.ink'),
    'years' => env('BEESOFT_YEARS', '2009-2018'),
    'sort_default' => env('SORT_DEFAULT', '255'),

    'websocket' => [
		'port' => env('WEBSOCKET_PORT', 9501),
	],
	'websockets' => [
		'port' => env('WEBSOCKETS_PORT', 9502),
	],

	'links' => [
		'default_type' => env('LINKS_DEFAULT_TYPE', 'commons'), // commons links
	],
	'pictures' => [
		'default_type' => env('PICTURES_DEFAULT_TYPE', 'commons'), // commons pictures
	]
];
