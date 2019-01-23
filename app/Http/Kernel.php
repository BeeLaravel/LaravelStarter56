<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class, // 维护模式 检查
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // post 大小 检查
        \App\Http\Middleware\TrimStrings::class, // 过滤关键词
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // 空字符串处理
        \App\Http\Middleware\TrustProxies::class, // 代理检查

        // \App\Http\Middleware\CheckIP::class, // IP 检查
        \App\Http\Middleware\Cors::class, // 跨域
    ];
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Cookie 加密
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // 添加 队列 Cookie 到响应
            \Illuminate\Session\Middleware\StartSession::class, // 开启 Session
            // \Illuminate\Session\Middleware\AuthenticateSession::class, // 处理Session 认证
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // 从 Session 获取 错误
            \App\Http\Middleware\VerifyCsrfToken::class, // 验证 跨站
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];
    protected $routeMiddleware = [
        // 'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'CheckPermission' => \App\Http\Middleware\CheckPermission::class,
    ];
}
