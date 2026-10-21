<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $items = Car::with('brand')->get();
        return view('admin.cars.index', compact('items'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }
}