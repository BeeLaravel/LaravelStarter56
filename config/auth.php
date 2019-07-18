<?php
// auth
return [
    'defaults' => [
        'guard' => 'web',
        'provider' => 'users',
        'passwords' => 'users',
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'backend' => [
            'driver' => 'session',
            'provider' => 'backend',
        ],
        'office' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Front\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Self\User::class,
        ],
        'backend' => [
            'driver' => 'eloquent',
            'model' => App\Models\Application\BackendUser::class,
        ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'rbac_password_resets',
            'expire' => 60,
        ],
    ],
];
