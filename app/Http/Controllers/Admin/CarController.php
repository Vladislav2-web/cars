<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $items = DB::table('cars')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->select('cars.*', 'brands.name as brand_name')
            ->get();

        return view('admin.cars.index', compact('items'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function show(int $id)
    {
        $car = DB::table('cars')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->select('cars.*', 'brands.name as brand_name')
            ->where('cars.id', $id)
            ->first();
        
        abort_if(! $car, 404);

        return view('admin.cars.show', compact('car'));
    }
}