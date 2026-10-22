<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('cars')->orderBy('name')->paginate(15);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->validated());

        return redirect()->route('admin.brands.index')
            ->with('success', 'Марка успешно добавлена');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());

        return redirect()->route('admin.brands.index')
            ->with('success', 'Изменения марки сохранены');
    }

    public function destroy(Brand $brand)
    {
        // Проверка: если у марки есть автомобили, удалять запрещено
        if ($brand->cars()->exists()) {
            return back()->with('error', 'Нельзя удалить марку: к ней привязаны автомобили!');
        }

        $brand->delete();

        return back()->with('success', 'Марка удалена');
    }
}