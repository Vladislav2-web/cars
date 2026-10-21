<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сейчас закрыто</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; background: #fdf3e1; color: #1e293b; }
        h1 { font-size: 3em; color: #b7791f; }
        p { font-size: 1.2em; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #2b6cb0; color: #fff; text-decoration: none; border-radius: 8px; }
    </style>
</head>
<body>
    <h1>Сейчас закрыто</h1>
    <p>Мы работаем с {{ $from }}:00 до {{ $to }}:00. Приходите в рабочее время!</p>
    <a href="{{ route('home') }}">На главную</a>
</body>
</html>