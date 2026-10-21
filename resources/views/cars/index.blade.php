<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог автомобилей - {{ config('app.name') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> |
        <a href="{{ route('cars.index') }}">Каталог авто</a> |
        <a href="{{ route('about') }}">О проекте</a> |
        <a href="{{ route('contacts') }}">Контакты</a> |
        <a href="/rules">Правила</a>
    </nav>

    <h1>Каталог автомобилей</h1>
    <ul>
        @foreach ($items as $id => $item)
            <li>
                <a href="{{ route('cars.show', $id) }}">{{ $item['title'] }}</a> 
                ({{ $item['year'] }} г.) — {{ $item['price'] }}
            </li>
        @endforeach
    </ul>
</body>
</html>