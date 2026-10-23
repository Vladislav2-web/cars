@extends('layouts.app')

@section('content')
<style>
    .form-box { max-width: 560px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 35px; }
    .form-box h1 { margin-top: 0; color: #fff; text-align: center; }
    .form-box label { display: block; margin: 16px 0 6px; color: #a0aec0; font-weight: bold; }
    .form-box input, .form-box select, .form-box textarea { width: 100%; padding: 11px; background: #141a26; color: #e2e8f0; border: 1px solid #2b3546; border-radius: 8px; box-sizing: border-box; font-family: inherit; font-size: 15px; }
    .form-box input:focus, .form-box select:focus, .form-box textarea:focus { outline: none; border-color: #63b3ed; }
    .form-box button { width: 100%; margin-top: 24px; padding: 13px; background: #3182ce; color: #fff; border: none; border-radius: 8px; font-weight: bold; font-size: 16px; cursor: pointer; }
    .form-box button:hover { background: #2b6cb0; }
    .alert-ok { background: #22543d; color: #c6f6d5; padding: 12px; border-radius: 8px; margin-bottom: 15px; }
    .alert-err { background: #742a2a; color: #fed7d7; padding: 12px; border-radius: 8px; margin-bottom: 15px; }
</style>

<div class="form-box">
    <h1>Тест-драйв</h1>

    @if (session('success'))
        <div class="alert-ok">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-err">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('test-drive.store') }}">
        @csrf

        <label for="name">Ваше имя</label>
        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required>

        <label for="phone">Телефон</label>
        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="+7 (999) 123-45-67" required>

        <label for="email">Email (необязательно)</label>
        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}">

        <label for="car_id">Автомобиль</label>
        <select id="car_id" name="car_id">
            <option value="">— Выберите автомобиль —</option>
            @foreach ($cars as $car)
                <option value="{{ $car->id }}" @selected(old('car_id', request('car_id')) == $car->id)>{{ $car->brand->name ?? '' }} {{ $car->title ?? $car->model ?? $car->name ?? ('Авто №' . $car->id) }}</option>
            @endforeach
        </select>

        <label for="preferred_date">Желаемая дата</label>
        <input id="preferred_date" type="date" name="preferred_date" value="{{ old('preferred_date') }}" min="{{ date('Y-m-d') }}" required>

        <label for="comment">Комментарий</label>
        <textarea id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>

        <button type="submit">Отправить заявку</button>
    </form>
</div>

<script>
    (function () {
        var d = document.getElementById('preferred_date');

        d.addEventListener('invalid', function () {
            if (d.validity.valueMissing) {
                d.setCustomValidity('Выберите дату тест-драйва');
            } else if (d.validity.rangeUnderflow) {
                d.setCustomValidity('Эта дата уже прошла. Выберите сегодняшнюю или более позднюю дату');
            } else {
                d.setCustomValidity('Введите корректную дату');
            }
        });

        d.addEventListener('input', function () { d.setCustomValidity(''); });
        d.addEventListener('change', function () { d.setCustomValidity(''); });
    })();
</script>
@endsection
