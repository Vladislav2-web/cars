<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Публичный каталог автомобилей и карточка автомобиля (Eloquent модель-биндгинг)
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Публичная страница конкретной марки (производителя)
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');

// Админ-панель (с защитой секретным ключом, как делали ранее)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminCarController::class, 'index'])->name('index');
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('create');
    Route::get('/cars/{car}', [AdminCarController::class, 'show'])->name('show');
});