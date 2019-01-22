<?php
require __DIR__ . '/../app/Helpers/helpers.php'; // 加载自定义函数

$app = new Illuminate\Foundation\Application( // 创建主类
    realpath(__DIR__.'/../')
);

$app->singleton( // http 网页
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);
$app->singleton( // console 控制台
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);
$app->singleton( // exception 异常
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app; // 返回主类
