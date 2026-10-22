@extends('layouts.app') <!-- или ваш общий админский layout -->

@section('content')
<div class="container" style="padding: 20px;">
    <h2>Уведомления администратора</h2>

    @forelse ($notifications as $notification)
        <div style="background: {{ $notification->read_at ? '#f9f9f9' : '#e6effa' }}; padding: 15px; margin-bottom: 10px; border-radius: 5px;">
            <p>{{ $notification->data['text'] ?? 'Новое уведомление' }}</p>
            <small style="color: gray;">{{ $notification->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Уведомлений пока нет.</p>
    @endforelse

    {{ $notifications->links() }}
</div>
@endsection