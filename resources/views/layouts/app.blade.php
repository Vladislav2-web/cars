<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Главная') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    @include('partials.nav')

    <main class="container">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>