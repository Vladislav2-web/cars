@extends('layouts.app')

@section('content')
<style>
    .page-box { max-width: 900px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 35px; }
    .page-box h1 { margin-top: 0; color: #fff; }
    .contact-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 25px; }
    .contact-card { background: #141a26; border: 1px solid #2b3546; border-radius: 10px; padding: 22px; }
    .contact-card small { color: #a0aec0; display: block; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 1px; }
    .contact-card div { color: #e2e8f0; font-size: 18px; }
    .contact-card a { color: #63b3ed; text-decoration: none; }
</style>

<div class="page-box">
    <h1>Контакты</h1>
    <p style="color:#cbd5e0;">Приезжайте в наш салон или свяжитесь с нами любым удобным способом.</p>

    <div class="contact-grid">
        <div class="contact-card">
            <small>Адрес</small>
            <div>г. Москва, ул. Автозаводская, д. 25</div>
        </div>
        <div class="contact-card">
            <small>Телефон</small>
            <div><a href="tel:+78001234567">+7 (800) 123-45-67</a></div>
        </div>
        <div class="contact-card">
            <small>Email</small>
            <div><a href="mailto:info@autosalon.ru">info@autosalon.ru</a></div>
        </div>
        <div class="contact-card">
            <small>Режим работы</small>
            <div>Пн–Сб: 9:00–20:00<br>Вс: 10:00–18:00</div>
        </div>
    </div>
</div>
@endsection
