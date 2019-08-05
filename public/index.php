<?php
define('LARAVEL_START', microtime(true)); // 记录开始时间

require __DIR__.'/../vendor/autoload.php'; // composer 自动加载

$app = require_once __DIR__.'/../bootstrap/app.php'; // 加载核心类

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); // http 网页

$response = $kernel->handle( // 处理请求
    $request = Illuminate\Http\Request::capture() // 请求
);
$response->send(); // 发送响应

$kernel->terminate($request, $response); // 
