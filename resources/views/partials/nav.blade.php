<nav class="menu" style="padding: 15px; background: #2b6cb0; color: #fff;">
    <a href="{{ route('home') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('home')])>Главная</a>
    <a href="{{ route('cars.index') }}" style="color: #fff; margin-right: 10px;" @class(['active' => request()->routeIs('cars.*')])>Каталог автомобилей</a>
</nav>