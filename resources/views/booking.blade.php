<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записаться на тест-драйв</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> |
        <a href="{{ route('cars.index') }}">Каталог</a>
    </nav>
    <h1>Записаться на тест-драйв</h1>
    <form>
        <p>Ваше имя: <input type="text" placeholder="Иван"></p>
        <p>Телефон: <input type="text" placeholder="+7 (...) ..."></p>
        <button type="button">Отправить заявку</button>
    </form>
</body>
</html>