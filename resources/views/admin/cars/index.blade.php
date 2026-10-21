@extends('layouts.admin')

@section('title', 'Управление авто')

@section('content')
    <h1>Управление каталогом автомобилей</h1>
    <a href="{{ route('admin.create') }}" class="badge" style="text-decoration: none; padding: 6px 12px;">+ Добавить автомобиль</a>
    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px; width: 100%; border-color: #2b3546; background: #171e29; color: #e2e8f0;">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Год</th>
            <th>Цена</th>
            <th>Статус</th>
        </tr>
        @foreach ($items as $id => $item)
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['year'] }}</td>
            <td>{{ $item['price'] }}</td>
            <td>
                @if ($loop->first)
                    <span style="color: #4cc488; font-weight: bold;">новая</span>
                @else
                    обычная
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection