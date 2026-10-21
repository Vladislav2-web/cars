<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        // Записываем информацию в лог ДО выполнения маршрута
        Log::info('Визит', [
            'url' => $request->fullUrl(),
            'ip'  => $request->ip(),
        ]);

        return $next($request); // Пропускаем запрос дальше
    }
}