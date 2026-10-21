<?php

use Illuminate\Support\Facades\Route;

// --- Маршруты ЛР1 ---
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'name' => 'Иван Иванов',
        'group' => 'П-31'
    ]);
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/hello/{name}', function (string $name) {
    return 'Здравствуйте, ' . $name . '! Добро пожаловать в Автосалон.';
});

// --- Маршруты ЛР2 (Каталог автомобилей, правила, редирект) ---
Route::get('/cars', function () {
    return view('cars.index', ['items' => config('catalog.items')]);
})->name('cars.index');

Route::get('/cars/{id}', function (int $id) {
    $car = config("catalog.items.$id");
    if (! $car) {
        abort(404);
    }
    return view('cars.show', ['id' => $id, 'car' => $car]);
})->whereNumber('id')->name('cars.show');

Route::view('/rules', 'rules');

Route::redirect('/main', '/');

// --- Маршруты ЛР2 (Админ-раздел с middleware) ---
Route::prefix('admin')->name('admin.')->middleware('admin.key')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');   
    Route::get('/cars', function () {
        return view('admin.cars.index', ['items' => config('catalog.items')]);
    })->name('index');
    Route::view('/cars/create', 'admin.cars.create')->name('create');
});

// Маршрут выхода из админки
Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home');
})->name('admin.logout');

// --- Маршруты ЛР2 (Запись на тест-драйв с ограничением по времени работы) ---
Route::view('/booking', 'booking')->middleware('hours:9,18')->name('booking');