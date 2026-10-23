<?php

// ====== 1. ВВЕРХУ routes/web.php, рядом с другими use ======
use App\Http\Controllers\SitePageController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ====== 2. В routes/web.php ======
// Старый маршрут '/' с именем 'home' УДАЛИТЕ и вставьте вместо него этот блок.
// Старые маршруты /login, /register, /logout тоже УДАЛИТЕ (если есть), иначе будет конфликт.
// Маршрут cars.index (каталог) и админские маршруты НЕ ТРОГАЙТЕ.

Route::get('/', [SitePageController::class, 'home'])->name('home');
Route::get('/about', [SitePageController::class, 'about'])->name('about');
Route::get('/contacts', [SitePageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [SitePageController::class, 'rules'])->name('rules');

Route::get('/test-drive', [TestDriveController::class, 'create'])->name('test-drive');
Route::post('/test-drive', [TestDriveController::class, 'store'])->name('test-drive.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
