@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; background: #ffffff; color: #1a202c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
    <h1 style="color: #2d3748; margin-bottom: 20px; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">Управление заявками</h1>
    
    @if(isset($bookings) && $bookings->count() > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background: #f7fafc; text-align: left; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 10px; color: #4a5568;">ID</th>
                    <th style="padding: 10px; color: #4a5568;">Пользователь</th>
                    <th style="padding: 10px; color: #4a5568;">Автомобиль</th>
                    <th style="padding: 10px; color: #4a5568;">Статус</th>
                    <th style="padding: 10px; color: #4a5568;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->id }}</td>
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->user->name ?? 'Не указан' }}</td>
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->car->title ?? 'Не указан' }}</td>
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->status }}</td>
                        <td style="padding: 10px; color: #2d3748;">
                            <!-- Здесь будут кнопки управления статусом -->
                            <span style="color: #3182ce;">Изменить</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: #718096; font-style: italic;">Список заявок пуст.</p>
    @endif
</div>
@endsection