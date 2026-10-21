<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $configKey = config('app.admin_key');

        // Если ключ в .env не задан (пустой), доступ закрыт ВСЕГДА
        if (empty($configKey)) {
            abort(403, 'Доступ запрещен: ключ администратора не настроен');
        }

        // Если в строке запроса передан правильный ключ (?key=...), сохраняем флаг в сессию
        if ($request->query('key') === $configKey) {
            $request->session()->put('is_admin', true);
        }

        // Если в сессии нет отметки администратора — вызываем ошибку 403
        if (! $request->session()->get('is_admin')) {
            abort(403, 'Нужен ключ администратора');
        }

        return $next($request);
    }
}