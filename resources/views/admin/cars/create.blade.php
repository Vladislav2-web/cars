<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ: Добавить автомобиль</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.index') }}">← К списку автомобилей</a>
    </nav>
    <h1>Добавление нового автомобиля</h1>
    <form>
        <p>Название: <input type="text" placeholder="Toyota..."></p>
        <p>Год: <input type="number" placeholder="2024"></p>
        <p>Цена: <input type="text" placeholder="0 ₸"></p>
        <button type="button">Сохранить (пока заглушка)</button>
    </form>
</body>
</html>