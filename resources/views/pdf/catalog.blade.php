<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        /* Для кириллицы в DomPDF обязательно использовать DejaVu Sans */
        body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; color: #333; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Каталог автомобилей от {{ now()->format('d.m.Y') }}</h2>
    
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Марка</th>
                <th>Год</th>
                <th>Цена (₸)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->title }}</td>
                    <td>{{ $car->brand->name ?? '—' }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ number_format($car->price, 0, ',', ' ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Всего автомобилей в каталоге: {{ $cars->count() }}
    </div>
</body>
</html>