@extends('layouts.app')

@section('content')
<style>
    .car-box { max-width: 900px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; overflow: hidden; }
    .car-photo { height: 320px; background: #2b3546; display: flex; align-items: center; justify-content: center; color: #a0aec0; font-size: 18px; }
    .car-photo img { width: 100%; height: 100%; object-fit: cover; }
    .car-info { padding: 30px; }
    .car-info h1 { margin: 0 0 10px; color: #fff; }
    .car-meta { color: #a0aec0; margin-bottom: 20px; }
    .car-price { font-size: 32px; font-weight: bold; color: #48bb78; margin: 15px 0 25px; }
    .car-desc { color: #cbd5e0; line-height: 1.7; margin-bottom: 25px; }
    .car-info .btn { display: inline-block; padding: 12px 26px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-right: 8px; }
    .btn-blue { background: #3182ce; color: #fff; }
    .btn-line { border: 1px solid #63b3ed; color: #63b3ed; }
</style>

@php
    $img = $car->image ?? $car->photo ?? $car->image_path ?? null;
@endphp

<div class="car-box">
    <div class="car-photo">
        @if ($img)
            <img src="{{ \Illuminate\Support\Str::startsWith($img, ['http', '/']) ? $img : asset('storage/' . $img) }}" alt="{{ $car->title }}">
        @else
            Нет фото
        @endif
    </div>

    <div class="car-info">
        <h1>{{ $car->title }}</h1>

        <div class="car-meta">
            Марка: {{ $car->brand->name ?? '—' }}
            @if ($car->year) · {{ $car->year }} г. @endif
        </div>

        <div class="car-price">{{ number_format((float) $car->price, 0, '', ' ') }} ₽</div>

        @if (!empty($car->description))
            <div class="car-desc">{{ $car->description }}</div>
        @elseif (!empty($car->brand->description))
            <div class="car-desc">{{ $car->brand->description }}</div>
        @endif

        <a href="{{ route('test-drive', ['car_id' => $car->id]) }}" class="btn btn-blue">Записаться на тест-драйв</a>
        <a href="{{ route('cars.pdf.one', $car) }}" class="btn btn-line">Скачать PDF</a>
        <a href="{{ route('cars.index') }}" class="btn btn-line">← Назад в каталог</a>
    </div>
</div>
@endsection