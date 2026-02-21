<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {
        //
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (TokenInvalidException $e, $request) {
            return response()->json(['error' => 'Token inválido'], 401);
        });

        $exceptions->render(function (TokenExpiredException $e, $request) {
            return response()->json(['error' => 'Token expirado'], 401);
        });

        $exceptions->render(function (JWTException $e, $request) {
            return response()->json(['error' => 'Token ausente ou inválido'], 401);
        });

        $exceptions->render(function (AuthenticationException $e, $request) {
            return response()->json([
                'error' => 'Não autenticado'
            ], 401);
        });
        
    })->create();
