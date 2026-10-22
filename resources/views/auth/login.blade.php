@extends('app')

@section('content')
<div style="max-width: 400px; margin: 40px auto; background: #ffffff; color: #1a202c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
    <h1 style="color: #2d3748; margin-bottom: 20px; text-align: center;">Вход в систему</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #4a5568; font-weight: bold;">Email</label>
            <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e0; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; color: #4a5568; font-weight: bold;">Пароль</label>
            <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e0; border-radius: 6px; box-sizing: border-box;">
        </div>

        <button type="submit" style="width: 100%; background: #3182ce; color: white; padding: 12px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">Войти</button>
    </form>
</div>
@endsection