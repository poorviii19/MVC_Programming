<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',  //to access wen.php uncomment this
        // web: __DIR__.'/../routes/web1.php', //to use web1.php
        web: __DIR__.'/../routes/web2.php', //to use web1.php
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkAge' => \App\Http\Middleware\CheckAge::class,
        ]);
        $middleware->group('adminGroup', [
            'auth',
            'checkAge',
        ]);
        //instead of repaeting middleware again and again we can create group and use it in controller
        $middleware->web(append:[\App\Http\Middleware\SetLocale::class]);
        // we can also create custom middleware and add it to the web group so that it will be applied to all the routes in the web group
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
