<?php
// workerman
return [
    'websocket' => [
		'port' => env('WORKERMAN_WEBSOCKET_PORT', 9701),
	],
	'websockets' => [
		'port' => env('WORKERMAN_WEBSOCKETS_PORT', 9702),
	],
];
