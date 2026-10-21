<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $car['title'] }} - Автосалон</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> |
        <a href="{{ route('cars.index') }}">К каталогу</a>
    </nav>

    <h1>Автомобиль: {{ $car['title'] }}</h1>
    <p><strong>ID в базе:</strong> {{ $id }}</p>
    <p><strong>Год выпуска:</strong> {{ $car['year'] }}</p>
    <p><strong>Цена:</strong> {{ $car['price'] }}</p>

    <br>
    <a href="{{ route('cars.index') }}">← Назад к списку автомобилей</a>
</body>
</html>