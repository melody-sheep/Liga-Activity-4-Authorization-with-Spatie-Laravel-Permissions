<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // Add global middleware here if needed
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [],
        'api' => [],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to routes using the
     * middleware key or directly in route definitions.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'ability' => \App\Http\Middleware\CheckAbility::class,
    ];
}
