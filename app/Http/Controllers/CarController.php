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

        $items = Car::with('brand')
            ->when($request->q, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->when($request->brand_id, fn ($q, $b) => $q->where('brand_id', $b))
            ->orderBy($sort)
            ->paginate(9)
            ->withQueryString();

        // Получаем все марки для выпадающего списка вместе с количеством машин (если нужно)
        $brands = Brand::withCount('cars')->orderBy('name')->get();

        return view('cars.index', compact('items', 'sort', 'brands'));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}