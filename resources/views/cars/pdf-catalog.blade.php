<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #1a202c; font-size: 13px; }
        h1 { font-size: 24px; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; background: #edf2f7; padding: 8px; border-bottom: 2px solid #cbd5e0; }
        td { padding: 8px; border-bottom: 1px solid #e2e8f0; }
        .footer { margin-top: 30px; font-size: 11px; color: #718096; }
    </style>
</head>
<body>
    <h1>Каталог автомобилей</h1>

    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Марка</th>
                <th>Год</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->title }}</td>
                    <td>{{ $car->brand->name ?? '—' }}</td>
                    <td>{{ $car->year ?? '—' }}</td>
                    <td>{{ number_format((float) $car->price, 0, '', ' ') }} руб.</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">Документ сформирован {{ now()->format('d.m.Y H:i') }}</div>
</body>
</html>