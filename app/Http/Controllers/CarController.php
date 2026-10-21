<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    // Список автомобилей
    public function index()
    {
        return view('cars.index', ['items' => config('catalog.items')]);
    }

    // Карточка отдельного автомобиля
    public function show(int $id)
    {
        $car = config("catalog.items.$id");
        
        // Короткая проверка с помощью abort_if
        abort_if(! $car, 404);

        return view('cars.show', compact('id', 'car'));
    }
}