@extends('layouts.app')

@section('content')
<style>
    .hero { max-width: 1000px; margin: 30px auto; text-align: center; padding: 60px 20px; background: linear-gradient(135deg, #1d2535, #243049); border: 1px solid #2b3546; border-radius: 16px; }
    .hero h1 { font-size: 40px; margin: 0 0 15px; color: #fff; }
    .hero p { font-size: 18px; color: #a0aec0; margin: 0 0 30px; }
    .btn { display: inline-block; padding: 12px 26px; border-radius: 8px; text-decoration: none; font-weight: bold; margin: 5px; }
    .btn-blue { background: #3182ce; color: #fff; }
    .btn-line { border: 1px solid #63b3ed; color: #63b3ed; }
    .features { max-width: 1000px; margin: 30px auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; }
    .feature { background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 25px; }
    .feature h3 { margin: 0 0 10px; color: #63b3ed; }
    .feature p { margin: 0; color: #a0aec0; line-height: 1.5; }
</style>

<div class="hero">
    <h1>Добро пожаловать!</h1>
    <p>Мы рады видеть вас в нашем автосалоне. Выбирайте автомобиль мечты и записывайтесь на тест-драйв.</p>
    <a href="{{ route('cars.index') }}" class="btn btn-blue">Смотреть машины</a>
    <a href="{{ url('/test-drive') }}" class="btn btn-line">Записаться на тест-драйв</a>
</div>

<div class="features">
    <div class="feature">
        <h3>Большой выбор</h3>
        <p>В каталоге представлены новые автомобили популярных марок: от практичных седанов до премиальных кроссоверов.</p>
    </div>
    <div class="feature">
        <h3>Честные цены</h3>
        <p>Прозрачные условия покупки без скрытых платежей. Цена в каталоге — это цена в договоре.</p>
    </div>
    <div class="feature">
        <h3>Тест-драйв</h3>
        <p>Оставьте заявку на сайте, и мы организуем для вас поездку на любом автомобиле из каталога.</p>
    </div>
</div>
@endsection
