@extends('layouts.app')

@section('content')
<style>
    .page-box { max-width: 900px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 35px; }
    .page-box h1 { margin-top: 0; color: #fff; }
    .page-box h2 { color: #63b3ed; margin-top: 30px; }
    .page-box p, .page-box li { color: #cbd5e0; line-height: 1.7; }
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 15px; margin: 25px 0; }
    .stat { background: #141a26; border: 1px solid #2b3546; border-radius: 10px; padding: 20px; text-align: center; }
    .stat b { display: block; font-size: 30px; color: #63b3ed; }
    .stat span { color: #a0aec0; font-size: 14px; }
</style>

<div class="page-box">
    <h1>О нас</h1>
    <p>Автосалон работает с 2010 года. За это время мы помогли более чем 5 000 клиентам найти свой автомобиль. Мы работаем с официальными поставщиками и гарантируем юридическую чистоту каждой машины.</p>

    <div class="stats">
        <div class="stat"><b>15+</b><span>лет на рынке</span></div>
        <div class="stat"><b>5 000+</b><span>довольных клиентов</span></div>
        <div class="stat"><b>20</b><span>марок в каталоге</span></div>
        <div class="stat"><b>24/7</b><span>поддержка</span></div>
    </div>

    <h2>Наша миссия</h2>
    <p>Сделать покупку автомобиля простой, понятной и приятной. Мы не навязываем лишних услуг и всегда объясняем условия сделки простым языком.</p>

    <h2>Почему выбирают нас</h2>
    <ul>
        <li>Только проверенные автомобили с полным пакетом документов</li>
        <li>Кредит и рассрочка на выгодных условиях</li>
        <li>Trade-in: примем ваш старый автомобиль в зачёт</li>
        <li>Гарантия и сервисное обслуживание</li>
    </ul>
</div>
@endsection
