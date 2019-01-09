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
            'provider' => 'officers',
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
            'model' => App\Models\RBAC\User::class,
        ],
        'backend' => [
            'driver' => 'eloquent',
            'model' => App\Models\RBAC\User::class,
        ],
        'officers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Office\User::class,
        ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admin',
            'table' => 'rbac_password_resets',
            'expire' => 60,
        ],
        'backend' => [
            'provider' => 'backend',
            'table' => 'rbac_password_resets',
            'expire' => 60,
        ],
        'officers' => [
            'provider' => 'office',
            'table' => 'office_password_resets',
            'expire' => 60,
        ],
    ],
];
