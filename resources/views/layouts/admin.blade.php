<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: #141a26; color: #e2e8f0; font-family: sans-serif; margin: 0;">
    <nav style="padding: 15px; background: #1d2535; border-bottom: 1px solid #2b3546;">
        <a href="{{ route('home') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">На сайт</a>
        <a href="{{ route('admin.index') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Главная админки</a>
        <a href="{{ route('admin.cars.index') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Управление авто</a>
    </nav>

    <div style="padding: 20px;">
        @yield('content')
    </div>
</body>
</html>