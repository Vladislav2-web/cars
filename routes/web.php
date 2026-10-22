<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;

// Публичные маршруты
Route::get('/', [CarController::class, 'index'])->name('home');

// Каталог автомобилей
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Бренды
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');

// Админ-панель
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminCarController::class, 'index'])->name('index');
    
    // Ресурсные маршруты для управления автомобилями и марками
    Route::resource('cars', AdminCarController::class)->except(['show']);
    Route::resource('brands', AdminBrandController::class)->except(['show']);
});