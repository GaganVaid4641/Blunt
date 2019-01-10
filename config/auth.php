<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        // Admin guards
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'admin-api' => [
                    'driver' => 'token',
                    'provider' => 'admins',
        ],

        // Super Admin guards
        'superadmin' => [
            'driver' => 'session',
            'provider' => 'superadmins',
        ],
        'superadmin-api' => [
                    'driver' => 'token',
                    'provider' => 'superadmins',
        ],
    ],


    //providers
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'superadmins' => [
            'driver' => 'eloquent',
            'model' => App\Superadmin::class,
        ],
    ],


    //Resetting Passwords
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'superadmins' => [
            'provider' => 'superadmins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];


