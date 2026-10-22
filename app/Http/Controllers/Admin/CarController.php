<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\Gate; // Обязательный импорт для Gate

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
        // Привязываем ID текущего пользователя к создаваемому авто
        Car::create($request->validated() + ['user_id' => $request->user()->id]);

        return redirect()->route('admin.cars.index')
            ->with('success', 'Автомобиль успешно добавлен');
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

        $car->update($request->validated());

        return redirect()->route('admin.cars.index')
            ->with('success', 'Изменения сохранены');
    }

    public function destroy(Car $car)
    {
        // Проверка прав через Policy (можно ли удалить эту запись)
        Gate::authorize('delete', $car);

        $car->delete();

        return back()->with('success', 'Автомобиль удален');
    }
}