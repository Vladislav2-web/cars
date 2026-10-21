<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show(Brand $brand)
    {
        // Загружаем марку вместе с её автомобилями
        $brand->load('cars');
        
        return view('brands.show', compact('brand'));
    }
}