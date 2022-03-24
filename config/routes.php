<?php
declare(strict_types=1);

/**
 * Конфигурация маршрутов
 */
return [

    /**
     * Маршруты для веба
     */
    'web' => [
        '.*' => [
            'http_method' => 'GET',
            'controller' => \App\Controllers\IndexController::class,
            'method' => 'index',
        ]
    ],

    /**
     * API маршруты
     */
    'api' => [
        'comments/get' => [
            'http_method' => 'GET',
            'controller' => \App\Controllers\CommentsController::class,
            'method' => 'get',
        ],
        'comments/store' => [
            'http_method' => 'POST',
            'controller' => \App\Controllers\CommentsController::class,
            'method' => 'store',
        ]
    ]
];
