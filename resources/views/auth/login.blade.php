@extends('layouts.app')

@section('content')
<style>
    .form-box { max-width: 420px; margin: 30px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 35px; }
    .form-box h1 { margin-top: 0; color: #fff; text-align: center; }
    .form-box label { display: block; margin: 16px 0 6px; color: #a0aec0; font-weight: bold; }
    .form-box input[type=email], .form-box input[type=password] { width: 100%; padding: 11px; background: #141a26; color: #e2e8f0; border: 1px solid #2b3546; border-radius: 8px; box-sizing: border-box; font-size: 15px; }
    .form-box input:focus { outline: none; border-color: #63b3ed; }
    .form-box button { width: 100%; margin-top: 24px; padding: 13px; background: #3182ce; color: #fff; border: none; border-radius: 8px; font-weight: bold; font-size: 16px; cursor: pointer; }
    .form-box button:hover { background: #2b6cb0; }
    .alert-err { background: #742a2a; color: #fed7d7; padding: 12px; border-radius: 8px; margin-bottom: 10px; }
    .form-link { text-align: center; margin-top: 18px; color: #a0aec0; }
    .form-link a { color: #63b3ed; text-decoration: none; }
</style>

<div class="form-box">
    <h1>Вход в систему</h1>

    @if ($errors->any())
        <div class="alert-err">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password">Пароль</label>
        <input id="password" type="password" name="password" required>

        <label style="display:flex; align-items:center; gap:8px; font-weight:normal;">
            <input type="checkbox" name="remember" style="width:auto;"> Запомнить меня
        </label>

        <button type="submit">Войти</button>
    </form>

    <div class="form-link">Нет аккаунта? <a href="{{ url('/register') }}">Зарегистрироваться</a></div>
</div>
@endsection
