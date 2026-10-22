<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand')->latest()->paginate(15);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.cars.create', compact('brands'));
    }

    public function store(StoreCarRequest $request)
    {
        Car::create($request->validated());

        return redirect()->route('admin.cars.index')
            ->with('success', 'Автомобиль успешно добавлен');
    }

    public function edit(Car $car)
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.cars.edit', compact('car', 'brands'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());

        return redirect()->route('admin.cars.index')
            ->with('success', 'Изменения успешно сохранены');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Автомобиль удален');
    }
}