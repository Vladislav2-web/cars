@extends('layouts.app')

@section('title', $car->title . ' - Автосалон')

@section('content')
    <div class="card" style="padding: 20px;">
        <h1>{{ $car->title }}</h1>
        <p><strong>Марка:</strong> {{ $car->brand_name }}</p>
        <p><strong>Год выпуска:</strong> {{ $car->year }} г.</p>
        <p><strong>Цена:</strong> {{ $car->price }} тнг.</p>
        <p><strong>Описание:</strong> {{ $car->description }}</p>
        
        <p style="margin-top: 20px;">
            <a href="{{ route('cars.index') }}" class="badge">← Назад к каталогу</a>
        </p>
    </div>
@endsection