@extends('layouts.admin')

@section('title', 'Управление автомобилями')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Управление автомобилями</h1>
        <a href="{{ route('admin.cars.create') }}" style="background: #319795; color: #fff; padding: 8px 14px; border-radius: 4px; text-decoration: none;">Добавить автомобиль</a>
    </div>

    @if (session('success'))
        <div style="background: #2f9e66; color: #fff; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: #1d2535;">
        <thead>
            <tr style="border-bottom: 1px solid #2b3546; text-align: left;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Название</th>
                <th style="padding: 10px;">Марка</th>
                <th style="padding: 10px;">Год</th>
                <th style="padding: 10px;">Цена</th>
                <th style="padding: 10px;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr style="border-bottom: 1px solid #2b3546;">
                    <td style="padding: 10px;">{{ $car->id }}</td>
                    <td style="padding: 10px;">{{ $car->title }}</td>
                    <td style="padding: 10px;">{{ $car->brand->name ?? 'Без марки' }}</td>
                    <td style="padding: 10px;">{{ $car->year }}</td>
                    <td style="padding: 10px;">{{ $car->price }} тнг.</td>
                    <td style="padding: 10px; display: flex; gap: 8px;">
                        <a href="{{ route('admin.cars.edit', $car) }}" style="color: #63b3ed; text-decoration: none;">Изменить</a>
                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" onsubmit="return confirm('Удалить запись?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #f07070; cursor: pointer; padding: 0;">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $cars->links() }}
    </div>
@endsection