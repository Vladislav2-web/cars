<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог автомобилей - Автосалон</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: #141a26; color: #e2e8f0; font-family: sans-serif; margin: 0;">

    <nav style="padding: 15px; background: #1d2535; border-bottom: 1px solid #2b3546; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <div style="display: flex; flex-wrap: wrap; gap: 15px;">
            <a href="{{ route('home') }}" style="color: #63b3ed; text-decoration: none;">Главная</a>
            <a href="{{ url('/about') }}" style="color: #63b3ed; text-decoration: none;">О нас</a>
            <a href="{{ url('/contacts') }}" style="color: #63b3ed; text-decoration: none;">Контакты</a>
            <a href="{{ route('cars.index') }}" style="color: #63b3ed; text-decoration: none;">Машины</a>
            <a href="{{ url('/rules') }}" style="color: #63b3ed; text-decoration: none;">Правила</a>
            <a href="{{ url('/test-drive') }}" style="color: #63b3ed; text-decoration: none;">Тест-драйв</a>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 15px; align-items: center;">
            @guest
                <a href="{{ url('/login') }}" style="color: #63b3ed; text-decoration: none;">Вход</a>
                <a href="{{ url('/register') }}" style="color: #63b3ed; text-decoration: none;">Регистрация</a>
            @endguest

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.test-drives.index') }}" style="color: #63b3ed; text-decoration: none;">Заявки тест-драйва</a>
                @endif
                <a href="{{ route('profile') }}" style="color: #63b3ed; text-decoration: none;">Профиль</a>

                @if(auth()->user()->role !== 'admin')
                    <a href="{{ route('my.test-drives') }}" style="color: #63b3ed; text-decoration: none;">Мои заявки</a>
                @endif

                <a href="{{ auth()->user()->role === 'admin' ? route('admin.notifications') : route('my.test-drives') }}" style="color: #ffc107; text-decoration: none;">
                    🔔 {{ auth()->user()->unreadNotifications->count() }}
                </a>

                <form method="POST" action="{{ url('/logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #63b3ed; cursor: pointer; font-size: inherit; padding: 0;">Выход</button>
                </form>
            @endauth
        </div>
    </nav>

    <main style="padding: 20px; min-height: 80vh;">
        @yield('content')
    </main>

    <footer style="margin-top: 40px; padding: 20px; text-align: center; color: #666; border-top: 1px solid #2b3546;">
        <p>&copy; 2026 Автосалон. Все права защищены.</p>
        <p>Запросов к БД: {{ count(DB::getQueryLog()) }}</p>
    </footer>
</body>
</html>