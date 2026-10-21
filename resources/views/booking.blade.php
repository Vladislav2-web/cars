@extends('layouts.app')

@section('title', 'Запись на тест-драйв')

@section('content')
    <h1>Записаться на тест-драйв</h1>
    <form>
        <p>Ваше имя: <input type="text" placeholder="Иван"></p>
        <p>Телефон: <input type="text" placeholder="+7 (...) ..."></p>
        <button type="button">Отправить заявку</button>
    </form>
@endsection