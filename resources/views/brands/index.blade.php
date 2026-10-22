@extends('layouts.admin')

@section('title', 'Управление марками')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Управление марками</h1>
        <a href="{{ route('admin.brands.create') }}" style="background: #319795; color: #fff; padding: 8px 14px; border-radius: 4px; text-decoration: none;">Добавить марку</a>
    </div>

    @if (session('success'))
        <div style="background: #2f9e66; color: #fff; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="background: #d64545; color: #fff; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: #1d2535;">
        <thead>
            <tr style="border-bottom: 1px solid #2b3546; text-align: left;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Название</th>
                <th style="padding: 10px;">Страна</th>
                <th style="padding: 10px;">Кол-во авто</th>
                <th style="padding: 10px;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr style="border-bottom: 1px solid #2b3546;">
                    <td style="padding: 10px;">{{ $brand->id }}</td>
                    <td style="padding: 10px;">{{ $brand->name }}</td>
                    <td style="padding: 10px;">{{ $brand->country ?? '—' }}</td>
                    <td style="padding: 10px;">{{ $brand->cars_count }}</td>
                    <td style="padding: 10px; display: flex; gap: 8px;">
                        <a href="{{ route('admin.brands.edit', $brand) }}" style="color: #63b3ed; text-decoration: none;">Изменить</a>
                        <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" onsubmit="return confirm('Удалить марку?')">
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
        {{ $brands->links() }}
    </div>
@endsection