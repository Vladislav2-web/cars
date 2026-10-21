@extends('layouts.app')

@section('title', 'Каталог автомобилей - Автосалон')

@section('content')
    <h1>Каталог автомобилей</h1>

    <!-- Форма поиска, фильтра и сортировки -->
    <form method="GET" action="{{ route('cars.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Поиск по названию..." style="padding: 6px; border-radius: 4px; border: 1px solid #ccc;">

        <select name="brand_id" style="padding: 6px; border-radius: 4px; border: 1px solid #ccc;">
            <option value="">Все марки</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @selected(request('brand_id') == $brand->id)>
                    {{ $brand->name }} ({{ $brand->cars_count }})
                </option>
            @endforeach
        </select>

        <select name="sort" style="padding: 6px; border-radius: 4px; border: 1px solid #ccc;">
            <option value="title" @selected(request('sort') == 'title')>Сортировать по названию</option>
            <option value="year" @selected(request('sort') == 'year')>Сортировать по году</option>
            <option value="price" @selected(request('sort') == 'price')>Сортировать по цене</option>
        </select>

        <button type="submit" class="badge" style="cursor: pointer; border: none; padding: 7px 14px;">Найти</button>
        <a href="{{ route('cars.index') }}" style="margin-left: 5px;">Сбросить</a>
    </form>

    <!-- Вывод списка автомобилей или предупреждения -->
    @if ($items->isEmpty())
        <x-alert type="warning">
            По вашему запросу ничего не найдено.
        </x-alert>
    @else
        <div style="display: grid; gap: 15px;">
            @foreach ($items as $item)
                <div class="card" style="padding: 15px; border: 1px solid #ddd; border-radius: 8px;">
                    <h3><a href="{{ route('cars.show', $item) }}">{{ $item->title }}</a></h3>
                    <p><strong>Марка:</strong> <a href="{{ route('brands.show', $item->brand) }}">{{ $item->brand->name }}</a></p>
                    <p><strong>Год:</strong> {{ $item->year }} | <strong>Цена:</strong> {{ $item->price }} тнг.</p>
                </div>
            @endforeach
        </div>

        <!-- Ссылки пагинации -->
        <div style="margin-top: 20px;">
            {{ $items->links() }}
        </div>
    @endif
@endsection