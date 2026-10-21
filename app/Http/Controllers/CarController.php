<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Белый список для безопасной сортировки
        $sort = in_array($request->sort, ['title', 'year', 'price']) ? $request->sort : 'title';

        // Запрос с пагинацией (9 элементов на страницу) и сохранением GET-параметров
        $items = Car::with('brand')
            ->search($request->q)
            ->when($request->brand_id, fn ($q, $b) => $q->where('brand_id', $b))
            ->orderBy($sort)
            ->paginate(9)
            ->withQueryString();

        // Получаем все марки с количеством автомобилей для выпадающего списка
        $brands = Brand::withCount('cars')->orderBy('name')->get();

        return view('cars.index', compact('items', 'brands'));
    }

    public function show(Car $car)
    {
        // Получаем 3 другие машины этой же марки для блока рекомендаций
        $relatedCars = Car::where('brand_id', $car->brand_id)
            ->where('id', '!=', $car->id)
            ->take(3)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }
}