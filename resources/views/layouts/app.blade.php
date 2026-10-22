<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог автомобилей - Автосалон</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: #141a26; color: #e2e8f0; font-family: sans-serif; margin: 0;">
    
    <nav style="padding: 15px; background: #1d2535; border-bottom: 1px solid #2b3546; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <a href="{{ route('home') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Главная</a>
            <a href="{{ route('cars.index') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Каталог</a>
        </div>
        
        <div>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Админ-панель</a>
                @endif
                <a href="{{ route('profile') }}" style="color: #63b3ed; margin-right: 15px; text-decoration: none;">Профиль</a>
                
                <a href="{{ route('admin.notifications') }}" style="color: #ffc107; text-decoration: none; margin-right: 15px;">
                    🔔 {{ auth()->user()->unreadNotifications->count() }}
                </a>
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