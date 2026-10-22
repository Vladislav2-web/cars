@extends('layouts.admin')

@section('title', 'Регистрация')

@section('content')
    <div style="max-width: 400px; margin: 0 auto; background: #1d2535; padding: 20px; border-radius: 8px;">
        <h2>Регистрация</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div style="margin-bottom: 12px;">
                <label>Имя:
                    <input type="text" name="name" value="{{ old('name') }}" style="display: block; width: 100%; padding: 6px;">
                </label>
                @error('name') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
            </div>

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
                @error('password') <div style="color: #f07070; font-size: 0.9em;">{{ $message }}</div> @enderror
            </div>

            <div style="margin-bottom: 12px;">
                <label>Повторите пароль:
                    <input type="password" name="password_confirmation" style="display: block; width: 100%; padding: 6px;">
                </label>
            </div>

            <button type="submit" style="padding: 8px 16px; background: #2b6cb0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Зарегистрироваться</button>
        </form>
    </div>
@endsection