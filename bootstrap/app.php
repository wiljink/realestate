<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        //api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);

        // Add global or group middleware if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Customize exception handling if needed
        // Example: log all exceptions to a custom channel
        // $exceptions->report(function (Throwable $e) {
        //     Log::channel('daily')->error($e);
        // });
    })
    ->create();
