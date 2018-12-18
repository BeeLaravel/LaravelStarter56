<?php
$path = storage_path('wechat/personal/');
return [
    'path' => $path,
    'swoole' => [
        'status' => env('SWOOLE_ENABLE', true),
        'ip' => env('SWOOLE_HOST', '127.0.0.1'),
        'port' => env('SWOOLE_PORT', '8866'),
    ],
    'workerman' => [
        'mode' => 'web', // web console
        'ip' => '0.0.0.0',
        'port' => 8866
    ],
    'download' => [ // 下载
        'image' => true,
        'voice' => true,
        'video' => true,
        'emoticon' => true,
        'file' => true,
        'emoticon_path' => $path.'emoticons', // 表情库路径
    ],
    'console' => [ // 输出
        'output' => true, // 是否输出
        'message' => true, // 是否输出接收消息
    ],
    'log' => [ // 日志
        'level' => 'debug',
        'permission' => 0777,
        'system' => $path.'log', // 系统报错
        'message' => $path.'log', // 消息
    ],
    'cache' => [ // 缓存
        'default' => env('WECHAT_PERSONAL_CACHE', 'redis'), // 缓存设置 redis|file
        'stores' => [
            'file' => [
                'driver' => 'file',
                'path' => $path.'cache',
            ],
            'redis' => [
                'driver' => 'redis',
                'connection' => 'default',
            ],
        ],
    ],
    'extension' => [ // 拓展
        'admin' => [ // 管理员
            'remark' => '',
            'nickname' => '',
        ],
        'tuling' => [
            'status' => true,
            'api' => 'http://www.tuling123.com/openapi/api',
            'key' => env('WECHAT_PERSONAL_TULING_KEY', ''),
            'error_message' => '图灵机器人失灵了，暂时没法陪聊了，T_T！',
        ],
    ],
];
