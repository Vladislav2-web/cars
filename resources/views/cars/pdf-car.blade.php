<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #1a202c; font-size: 14px; }
        h1 { font-size: 26px; margin-bottom: 4px; }
        .meta { color: #4a5568; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td { padding: 8px; border-bottom: 1px solid #cbd5e0; }
        td.label { color: #4a5568; width: 35%; }
        .price { font-size: 24px; font-weight: bold; color: #276749; margin: 15px 0 20px; }
        .footer { margin-top: 40px; font-size: 11px; color: #718096; border-top: 1px solid #cbd5e0; padding-top: 8px; }
    </style>
</head>
<body>
    <h1>{{ $car->title }}</h1>
    <div class="meta">Автосалон — карточка автомобиля</div>

    <table>
        <tr><td class="label">Марка</td><td>{{ $car->brand->name ?? '—' }}</td></tr>
        <tr><td class="label">Год выпуска</td><td>{{ $car->year ?? '—' }}</td></tr>
        <tr><td class="label">Номер в каталоге</td><td>{{ $car->id }}</td></tr>
    </table>

    <div class="price">{{ number_format((float) $car->price, 0, '', ' ') }} руб.</div>

    @if (!empty($car->description))
        <p>{{ $car->description }}</p>
    @elseif (!empty($car->brand->description))
        <p>{{ $car->brand->description }}</p>
    @endif

    <div class="footer">Документ сформирован {{ now()->format('d.m.Y H:i') }}</div>
</body>
</html>