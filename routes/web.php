<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;

// --- Маршруты страниц ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [PageController::class, 'rules'])->name('rules');

Route::get('/hello/{name}', function (string $name) {
    return 'Здравствуйте, ' . $name . '! Добро пожаловать в Автосалон.';
});

// --- Каталог автомобилей ---
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->whereNumber('id')->name('cars.show');

Route::redirect('/main', '/');

// --- Админ-раздел с middleware и контроллерами ---
Route::prefix('admin')->name('admin.')->middleware('admin.key')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');   
    Route::get('/cars', [AdminCarController::class, 'index'])->name('index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('create');
});

// Маршрут выхода из админки
Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home');
})->name('admin.logout');

// --- Запись на тест-драйв с ограничением по времени ---
Route::view('/booking', 'booking')->middleware('hours:9,18')->name('booking');