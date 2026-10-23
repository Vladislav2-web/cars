@extends('layouts.app')

@section('content')
<style>
    .cl-box { max-width: 900px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 30px; }
    .cl-box h1 { margin-top: 0; color: #fff; }
    .cl-box h2 { color: #63b3ed; margin-top: 30px; }
    .cl-item { background: #141a26; border: 1px solid #2b3546; border-radius: 10px; padding: 15px; margin-bottom: 12px; color: #e2e8f0; }
    .cl-item small { color: #a0aec0; }
    .badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: bold; }
    .badge-wait { background: #744210; color: #fefcbf; }
    .badge-ok { background: #22543d; color: #c6f6d5; }
    .badge-no { background: #742a2a; color: #fed7d7; }
    .cl-new { background: #3182ce; color: #fff; padding: 2px 8px; border-radius: 10px; font-size: 12px; margin-left: 6px; }
</style>

<div class="cl-box">
    <h1>Мои заявки на тест-драйв</h1>

    <h2>Уведомления</h2>
    @forelse ($notifications as $n)
        <div class="cl-item">
            {{ $n->data['message'] ?? 'Новое уведомление' }}
            @if (is_null($n->read_at)) <span class="cl-new">новое</span> @endif
            <div><small>{{ $n->created_at->format('d.m.Y H:i') }}</small></div>
        </div>
    @empty
        <p style="color:#a0aec0; font-style:italic;">Уведомлений пока нет.</p>
    @endforelse

    <h2>Мои заявки</h2>
    @forelse ($testDrives as $t)
        <div class="cl-item">
            <b>
                @if ($t->car)
                    {{ $t->car->brand->name ?? '' }} {{ $t->car->title ?? $t->car->model ?? $t->car->name ?? ('Авто №' . $t->car->id) }}
                @else
                    Автомобиль не выбран
                @endif
            </b>
            — {{ $t->preferred_date->format('d.m.Y') }}

            @if ($t->status === 'approved')
                <span class="badge badge-ok">Одобрена</span>
            @elseif ($t->status === 'rejected')
                <span class="badge badge-no">Отклонена</span>
            @else
                <span class="badge badge-wait">На рассмотрении</span>
            @endif

            @if ($t->admin_comment)
                <div style="margin-top:6px;"><small>Комментарий: {{ $t->admin_comment }}</small></div>
            @endif
        </div>
    @empty
        <p style="color:#a0aec0; font-style:italic;">Вы ещё не отправляли заявок. <a href="{{ route('test-drive') }}" style="color:#63b3ed;">Записаться на тест-драйв</a></p>
    @endforelse
</div>
@endsection