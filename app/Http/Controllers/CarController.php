<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Поиск по ключевому слову (название, марка, описание)
        if ($request->filled('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('brand', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        // Фильтрация по марке
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        // Сортировка
        if ($request->input('sort') === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->input('sort') === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $cars = $query->paginate(9)->withQueryString();

        return view('cars.index', compact('cars'));
    }

        public function show(\App\Models\Car $car)
    {
        $car->load('brand');

        return view('cars.show', compact('car'));
    }

        public function carPdf(Car $car)
    {
        $car->load('brand');

        $pdf = Pdf::loadView('cars.pdf-car', compact('car'));

        return $pdf->download('car-' . $car->id . '.pdf');
    }

    public function pdf(Request $request)
    {
        $cars = Car::with('brand')->latest()->get();

        $pdf = Pdf::loadView('cars.pdf-catalog', compact('cars'));

        return $pdf->download('catalog.pdf');
    }
}