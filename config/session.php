<?php
// session 会话
return [
    'driver' => env('SESSION_DRIVER', 'file'), // array file cookie database apc memcached redis
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => false,
    'encrypt' => false, // 加密

    'files' => storage_path('framework/sessions'), // 文件 - 存储路径

    'connection' => null, // 数据库 - 连接
    'table' => 'sessions', // 数据库 - 表名

    'store' => null, // 存储
    'lottery' => [2, 100], // 垃圾回收机制

    'cookie' => env('SESSION_COOKIE', str_slug(env('APP_NAME', 'laravel'), '_').'_session'), // session cookie name
    'path' => '/', // session cookie 路径
    'domain' => env('SESSION_DOMAIN', null), // 域名
    'secure' => env('SESSION_SECURE_COOKIE', false), // 安全
    'http_only' => true, // https
    'same_site' => null, // 
];
