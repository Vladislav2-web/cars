<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Админ-панель') — Автосалон</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: #141a26; color: #e2e8f0; font-family: sans-serif; margin: 0;">
    <nav style="padding: 15px; background: #1d2535; border-bottom: 1px solid #2b3546;">
        <a href="{{ route('home') }}" style="color: #63b3ed; margin-right: 15px;">На сайт</a>
        <a href="{{ route('admin.dashboard') }}" style="color: #63b3ed; margin-right: 15px;">Главная админки</a>
        <a href="{{ route('admin.index') }}" style="color: #63b3ed; margin-right: 15px;">Управление авто</a>
        <a href="{{ route('admin.logout') }}" style="color: #f07070; float: right;">Выход</a>
    </nav>
    <div style="padding: 20px;">
        @yield('content')
    </div>
</body>
</html>