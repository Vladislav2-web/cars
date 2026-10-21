<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Главная') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.nav')

    <main class="container">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
<footer style="margin-top: 40px; text-align: center; color: #666;">
    <p>Запросов к БД: {{ count(DB::getQueryLog()) }}</p>
</footer>
</html>