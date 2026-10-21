<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions; // Убедись, что этот импорт есть или класс указан верно

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\LogVisit::class,
        ]);
        
       $middleware->alias([
            'admin.key' => \App\Http\Middleware\CheckAdminKey::class,
            'hours'     => \App\Http\Middleware\WorkingHours::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();