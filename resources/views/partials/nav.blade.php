<nav class="menu" style="padding: 15px; background: #2b6cb0; color: #fff;">
    <a href="{{ route('home') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('home')])>Главная</a>
    <a href="{{ route('cars.index') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('cars.*')])>Каталог авто</a>
    <a href="{{ route('about') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('about')])>О проекте</a>
    <a href="{{ route('contacts') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('contacts')])>Контакты</a>
    <a href="{{ route('rules') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('rules')])>Правила</a>
    <a href="{{ route('booking') }}" style="color: #fff;" @class(['active' => request()->routeIs('booking')])>Запись</a>
</nav>