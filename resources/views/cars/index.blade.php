@extends('layouts.app')

@section('title', 'Каталог автомобилей')

@section('content')
    <h1>Каталог автомобилей</h1>
    
    @forelse ($items as $id => $item)
        <x-card :title="$loop->iteration . '. ' . $item['title']" 
                :url="route('cars.show', $id)" 
                :badge="$item['year'] > 2021 ? 'Новинка' : null">
            Год выпуска: {{ $item['year'] }} г. | Цена: {{ $item['price'] }}
        </x-card>
    @empty
        <p>Каталог автомобилей пока пуст.</p>
    @endforelse
@endsection