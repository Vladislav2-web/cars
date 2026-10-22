@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <h1 style="margin-bottom: 24px; font-size: 28px; font-weight: bold;">Каталог автомобилей</h1>

    <!-- Форма поиска и фильтрации -->
    <form method="GET" action="{{ route('cars.index') }}" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
        
        <!-- Поле поиска по названию/марке -->
        <div style="flex: 1; min-width: 200px;">
            <input 
                type="text" 
                name="q" 
                value="{{ request('q') }}" 
                placeholder="Поиск по названию или марке (например, BMW)..." 
                style="width: 100%; padding: 10px 14px; border: 1px solid #ced4da; border-radius: 6px; box-sizing: border-box;"
            >
        </div>

        <!-- Сортировка -->
        <div style="min-width: 180px;">
            <select name="sort" style="width: 100%; padding: 10px 14px; border: 1px solid #ced4da; border-radius: 6px; background-color: #fff;">
                <option value="">Сортировка по умолчанию</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Сначала дешевле</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Сначала дороже</option>
            </select>
        </div>

        <!-- Кнопки управления -->
        <button type="submit" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
            Найти
        </button>
        
        @if(request('q') || request('sort'))
            <a href="{{ route('cars.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; border-radius: 6px; text-decoration: none; font-weight: 500;">
                Сбросить
            </a>
        @endif
    </form>

    <!-- Сетка автомобилей -->
    @if($cars->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px;">
            @foreach($cars as $car)
                <div style="border: 1px solid #e0e0e0; border-radius: 10px; overflow: hidden; background: #fff; display: flex; flex-direction: column; justify-content: space-between;">
                    
                    <div>
                        <!-- Изображение автомобиля -->
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 200px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                Нет фото
                            </div>
                        @endif

                        <div style="padding: 16px;">
                            <h3 style="margin: 0 0 8px 0; font-size: 20px;">{{ $car->title }}</h3>
                            <p style="margin: 0 0 12px 0; color: #6c757d; font-size: 14px;">
                                {{ $car->brand ?? 'Автомобиль' }} @if($car->year) | {{ $car->year }} г.@endif
                            </p>
                            <p style="font-size: 22px; font-weight: bold; color: #198754; margin: 0 0 16px 0;">
                                {{ number_format($car->price, 0, '.', ' ') }} ₽
                            </p>
                        </div>
                    </div>

                    <div style="padding: 16px; border-top: 1px solid #f0f0f0; background: #fafafa;">
                        <a href="{{ route('cars.show', $car->id) }}" style="display: block; text-align: center; width: 100%; padding: 10px 0; background-color: #0d6efd; color: white; border-radius: 6px; text-decoration: none; font-weight: 500; box-sizing: border-box;">
                            Подробнее
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        <div style="margin-top: 30px;">
            {{ $cars->links() }}
        </div>
    @else
        <div style="padding: 20px; background-color: #e2e3e5; border-radius: 8px; color: #383d41; text-align: center;">
            ⚠️ По вашему запросу ничего не найдено.
        </div>
    @endif
</div>
@endsection