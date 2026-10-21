<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора - Автосалон</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">На сайт</a> |
        <a href="{{ route('admin.dashboard') }}">Главная админки</a> |
        <a href="{{ route('admin.index') }}">Управление авто</a>
    </nav>
    <h1>Панель администратора</h1>
    <p>Добро пожаловать в закрытый раздел сотрудников автосалона.</p>
    <ul>
        <li><a href="{{ route('admin.index') }}">Список автомобилей (управление)</a></li>
        <li><a href="{{ route('admin.create') }}">Добавить новый автомобиль</a></li>
    </ul>
</body>
</html>