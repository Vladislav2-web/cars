<?php

use Illuminate\Support\Facades\Route;

// 1. Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Страница "О проекте"
Route::get('/about', function () {
    return view('about', [
        'name' => 'Иван Иванов',
        'group' => 'П-31'
    ]);
})->name('about');

// 3. Страница "Контакты"
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

// 4. Приветствие с параметром
Route::get('/hello/{name}', function (string $name) {
    return 'Здравствуйте, ' . $name . '! Добро пожаловать в Автосалон.';
});

// 5. Страница автомобиля по ID (только цифры)
Route::get('/cars/{id}', function (string $id) {
    return view('car-show', ['id' => $id]);
})->whereNumber('id')->name('cars.show');