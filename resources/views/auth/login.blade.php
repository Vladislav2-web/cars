@extends('layouts.admin')

@section('title', 'Вход в систему')

@section('content')
    <div style="max-width: 400px; margin: 0 auto; background: #1d2535; padding: 20px; border-radius: 8px;">
        <h2>Вход</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-bottom: 12px;">
                <label>E-mail:
                    <input type="email" name="email" value="{{ old('email') }}" style="display: block; width: 100%; padding: 6px;">
                </label>
                @error('email') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
            </div>

            <div style="margin-bottom: 12px;">
                <label>Пароль:
                    <input type="password" name="password" style="display: block; width: 100%; padding: 6px;">
                </label>
            </div>

            <div style="margin-bottom: 12px;">
                <label>
                    <input type="checkbox" name="remember"> Запомнить меня
                </label>
            </div>

            <button type="submit" style="padding: 8px 16px; background: #2b6cb0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Войти</button>
        </form>
    </div>
@endsection