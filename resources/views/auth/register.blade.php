@extends('layouts.app')

@section('content')
<style>
    .form-box { max-width: 420px; margin: 30px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 35px; }
    .form-box h1 { margin-top: 0; color: #fff; text-align: center; }
    .form-box label { display: block; margin: 16px 0 6px; color: #a0aec0; font-weight: bold; }
    .form-box input { width: 100%; padding: 11px; background: #141a26; color: #e2e8f0; border: 1px solid #2b3546; border-radius: 8px; box-sizing: border-box; font-size: 15px; }
    .form-box input:focus { outline: none; border-color: #63b3ed; }
    .form-box button { width: 100%; margin-top: 24px; padding: 13px; background: #3182ce; color: #fff; border: none; border-radius: 8px; font-weight: bold; font-size: 16px; cursor: pointer; }
    .form-box button:hover { background: #2b6cb0; }
    .alert-err { background: #742a2a; color: #fed7d7; padding: 12px; border-radius: 8px; margin-bottom: 10px; }
    .form-link { text-align: center; margin-top: 18px; color: #a0aec0; }
    .form-link a { color: #63b3ed; text-decoration: none; }
</style>

<div class="form-box">
    <h1>Регистрация</h1>

    @if ($errors->any())
        <div class="alert-err">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Имя</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Пароль (минимум 6 символов)</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Повторите пароль</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Зарегистрироваться</button>
    </form>

    <div class="form-link">Уже есть аккаунт? <a href="{{ url('/login') }}">Войти</a></div>
</div>
@endsection
