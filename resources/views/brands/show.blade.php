@extends('layouts.app')

@section('title', $brand->name . ' - Автосалон')

@section('content')
    <div class="card" style="padding: 20px;">
        <h1>Марка: {{ $brand->name }}</h1>
        <p>{{ $brand->description }}</p>

        <h3 style="margin-top: 20px;">Автомобили бренда {{ $brand->name }}:</h3>
        <ul>
            @forelse ($brand->cars as $car)
                <li>
                    <a href="{{ route('cars.show', $car) }}">{{ $car->title }}</a> ({{ $car->year }} г.) — {{ $car->price }} тнг.
                </li>
            @empty
                <p>У этой марки пока нет автомобилей в каталоге.</p>
            @endforelse
        </ul>

        <p style="margin-top: 20px;">
            <a href="{{ route('cars.index') }}" class="badge">← Назад к каталогу</a>
        </p>
    </div>
@endsection