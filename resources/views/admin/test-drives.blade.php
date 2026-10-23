@extends('layouts.app')

@section('content')
<style>
    .adm-box { max-width: 1200px; margin: 20px auto; background: #1d2535; border: 1px solid #2b3546; border-radius: 12px; padding: 30px; }
    .adm-box h1 { margin-top: 0; color: #fff; }
    .adm-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    .adm-table th { text-align: left; color: #a0aec0; font-size: 13px; text-transform: uppercase; padding: 10px; border-bottom: 1px solid #2b3546; }
    .adm-table td { padding: 12px 10px; border-bottom: 1px solid #2b3546; color: #e2e8f0; vertical-align: top; }
    .adm-table a { color: #63b3ed; text-decoration: none; }
    .adm-empty { color: #a0aec0; font-style: italic; margin-top: 15px; }
    .alert-ok { background: #22543d; color: #c6f6d5; padding: 12px; border-radius: 8px; margin-bottom: 15px; }
    .badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: bold; }
    .badge-ok { background: #22543d; color: #c6f6d5; }
    .badge-no { background: #742a2a; color: #fed7d7; }
    .act-input { width: 100%; padding: 8px; margin-bottom: 8px; background: #141a26; color: #e2e8f0; border: 1px solid #2b3546; border-radius: 6px; box-sizing: border-box; }
    .act-btn { padding: 8px 14px; border: none; border-radius: 6px; color: #fff; font-weight: bold; cursor: pointer; }
    .act-ok { background: #2f855a; }
    .act-no { background: #c53030; }
</style>

<div class="adm-box">
    <h1>Управление заявками на тест-драйв</h1>

    @if (session('success'))
        <div class="alert-ok">{{ session('success') }}</div>
    @endif

    @if ($requests->count())
        <div style="overflow-x:auto;">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Получена</th>
                        <th>Клиент</th>
                        <th>Автомобиль</th>
                        <th>Дата</th>
                        <th>Комментарий клиента</th>
                        <th style="min-width:260px;">Решение</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <b>{{ $r->name }}</b><br>
                                <a href="tel:{{ $r->phone }}">{{ $r->phone }}</a><br>
                                {{ $r->email ?? '' }}
                            </td>
                            <td>
                                @if ($r->car)
                                    {{ $r->car->brand->name ?? '' }} {{ $r->car->title ?? $r->car->model ?? $r->car->name ?? ('Авто №' . $r->car->id) }}
                                @else
                                    —
                                @endif
                            </td>
                            <td>{{ $r->preferred_date->format('d.m.Y') }}</td>
                            <td>{{ $r->comment ?? '—' }}</td>
                            <td>
                                @if ($r->status === 'approved')
                                    <span class="badge badge-ok">Одобрена</span>
                                @elseif ($r->status === 'rejected')
                                    <span class="badge badge-no">Отклонена</span>
                                @else
                                    <form method="POST" action="{{ route('admin.test-drives.status', $r) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input class="act-input" type="text" name="admin_comment" placeholder="Комментарий клиенту (необязательно)">
                                        <button class="act-btn act-ok" type="submit" name="status" value="approved">Одобрить</button>
                                        <button class="act-btn act-no" type="submit" name="status" value="rejected">Отклонить</button>
                                    </form>
                                @endif

                                @if ($r->admin_comment)
                                    <div style="margin-top:8px; color:#a0aec0; font-size:14px;">{{ $r->admin_comment }}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">{{ $requests->links() }}</div>
    @else
        <div class="adm-empty">Заявок пока нет.</div>
    @endif
</div>
@endsection