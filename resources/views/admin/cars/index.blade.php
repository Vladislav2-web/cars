<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ: Список автомобилей</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">← Назад в админку</a>
    </nav>
    <h1>Управление каталогом автомобилей</h1>
    <a href="{{ route('admin.create') }}">+ Добавить автомобиль</a>
    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Год</th>
            <th>Цена</th>
        </tr>
        @foreach ($items as $id => $item)
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['year'] }}</td>
            <td>{{ $item['price'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>