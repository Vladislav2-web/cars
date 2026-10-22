<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CarController extends Controller
{
    public function index()
    {
        // Подгружаем автомобили вместе с маркой и автором (user)
        $cars = Car::with(['brand', 'user'])->latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.cars.create', compact('brands'));
    }

    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();

        // Если загружена обложка, сохраняем её на публичный диск в папку covers
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Привязываем ID текущего пользователя к создаваемому авто
        Car::create($data + ['user_id' => $request->user()->id]);

        return redirect()->route('admin.cars.index')
            ->with('success', 'Автомобиль успешно добавлен');
    }

    public function pdf(Request $request)
{
    $cars = Car::with('brand')
        ->when($request->brand_id, fn ($q, $b) => $q->where('brand_id', $b))
        ->orderBy('title')
        ->get();

    return Pdf::loadView('pdf.catalog', compact('cars'))
        ->setPaper('a4')
        ->download('cars-catalog-' . now()->format('Y-m-d') . '.pdf');
}

    public function edit(Car $car)
    {
        // Проверка прав через Policy (метод update)
        Gate::authorize('update', $car);

        $brands = Brand::orderBy('name')->get();
        return view('admin.cars.edit', compact('car', 'brands'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        // Проверка прав через Policy перед обновлением
        Gate::authorize('update', $car);

        $data = $request->validated();

        // Обработка загрузки новой обложки
        if ($request->hasFile('cover')) {
            // Удаляем старый файл, если он существовал
            Storage::disk('public')->delete($car->cover ?? '');
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $car->update($data);

        return redirect()->route('admin.cars.index')
            ->with('success', 'Изменения сохранены');
    }

    public function destroy(Car $car)
    {
        // Проверка прав через Policy (можно ли удалить эту запись)
        Gate::authorize('delete', $car);

        // Удаляем файл обложки с диска при удалении записи
        Storage::disk('public')->delete($car->cover ?? '');
        
        $car->delete();

        return back()->with('success', 'Автомобиль удален');
    }
}