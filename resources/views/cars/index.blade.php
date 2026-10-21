@extends('layouts.app')

@section('title', 'Каталог автомобилей')

@section('content')
    <h1>Каталог автомобилей</h1>
    
    @forelse ($items as $id => $item)
        <div class="card">
            <span>{{ $loop->iteration }}.</span>
            <a href="{{ route('cars.show', $id) }}">{{ $item['title'] }}</a> 
            ({{ $item['year'] }} г.) — {{ $item['price'] }}
            
            @if ($item['year'] > 2021)
                <span class="badge">Новинка</span>
            @endif
        </div>
    @empty
        <p>Каталог автомобилей пока пуст.</p>
    @endforelse
@endsection