<?php
// swoole
return [
	'websocket' => [
		'port' => env('SWOOLE_WEBSOCKET_PORT', 9601),
	],
	'websockets' => [
		'port' => env('SWOOLE_WEBSOCKETS_PORT', 9602),
	],
];
