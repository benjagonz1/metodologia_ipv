<?php
require_once __DIR__ . '/env.php';

return [
    'app' => [
        'env' => env('APP_ENV', 'production'),
        'debug' => env('APP_DEBUG', false)
    ],

    'db' => [
        'host' => env('DB_HOST'),
        'name' => env('DB_NAME'),
        'user' => env('DB_USER'),
        'pass' => env('DB_PASS')
    ]
];
