@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 40px auto; background: #ffffff; color: #1a202c; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
    <h1 style="color: #2d3748; margin-bottom: 10px; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">Личный кабинет</h1>
    
    <p style="font-size: 18px; color: #4a5568; margin-bottom: 30px;">
        Добро пожаловать, <strong>{{ auth()->user()->name }}</strong>!
    </p>

    <h2 style="color: #2d3748; font-size: 22px; margin-bottom: 15px;">Ваши заявки</h2>

    @if(isset($bookings) && $bookings->count() > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background: #f7fafc; text-align: left; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 10px; color: #4a5568;">Автомобиль</th>
                    <th style="padding: 10px; color: #4a5568;">Дата</th>
                    <th style="padding: 10px; color: #4a5568;">Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->car->title ?? 'Машина не указана' }}</td>
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->created_at->format('d.m.Y H:i') }}</td>
                        <td style="padding: 10px; color: #2d3748;">{{ $booking->status ?? 'В обработке' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            {{ $bookings->links() }}
        </div>
    @else
        <p style="color: #718096; font-style: italic;">У вас пока нет заявок.</p>
    @endif
</div>
@endsection