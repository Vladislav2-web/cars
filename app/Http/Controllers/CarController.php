<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $items = DB::table('cars')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->select('cars.*', 'brands.name as brand_name')
            ->orderBy('cars.title')
            ->get();

        return view('cars.index', compact('items'));
    }

    public function show(int $id)
    {
        $car = DB::table('cars')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->select('cars.*', 'brands.name as brand_name')
            ->where('cars.id', $id)
            ->first();
        
        abort_if(! $car, 404);

        return view('cars.show', compact('id', 'car'));
    }
}