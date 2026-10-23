<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\SitePageController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\TestDriveController as AdminTestDriveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Обычные страницы сайта
Route::get('/', [SitePageController::class, 'home'])->name('home');
Route::get('/about', [SitePageController::class, 'about'])->name('about');
Route::get('/contacts', [SitePageController::class, 'contacts'])->name('contacts');
Route::get('/rules', [SitePageController::class, 'rules'])->name('rules');

// Каталог автомобилей
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{car}/pdf', [CarController::class, 'carPdf'])->name('cars.pdf.one');

// PDF-каталог
Route::get('/cars-pdf', [CarController::class, 'pdf'])->name('cars.pdf');

// Заявка на тест-драйв
Route::get('/test-drive', [TestDriveController::class, 'create'])->name('test-drive');
Route::post('/test-drive', [TestDriveController::class, 'store'])->name('test-drive.store');

// --- Вход и регистрация (только для гостей) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Выход
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Временный быстрый вход под админом (для тестирования)
Route::get('/login-as-admin', function () {
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        auth()->login($admin);
        return redirect('/admin');
    }
    return 'Администратор не найден в БД. Выполнили ли вы php artisan db:seed?';
});

// --- Маршруты для авторизованных пользователей ---
Route::middleware('auth')->group(function () {
    Route::post('/cars/{car}/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/profile', function () {
        $bookings = auth()->user()->bookings()->with('car')->latest()->paginate(10);
        return view('profile', compact('bookings'));
    })->name('profile');

    Route::get('/my-test-drives', function () {
        $user = auth()->user();
        $testDrives = \App\Models\TestDrive::with('car')->where('user_id', $user->id)->latest()->get();
        $notifications = $user->notifications()->latest()->take(20)->get();
        $user->unreadNotifications->markAsRead();

        return view('my-test-drives', compact('testDrives', 'notifications'));
    })->name('my.test-drives');
});

// --- Административные маршруты ---
Route::group([
    'middleware' => ['auth', function ($request, $next) {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }
        abort(403, 'Доступ запрещен.');
    }],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::get('/', function () {
        return redirect()->route('admin.bookings.index');
    })->name('index');

    Route::resource('cars', AdminCarController::class);

    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/test-drives', [AdminTestDriveController::class, 'index'])->name('test-drives.index');
        Route::patch('/test-drives/{testDrive}/status', [AdminTestDriveController::class, 'updateStatus'])->name('test-drives.status');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.status');

    Route::get('/notifications', function () {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('admin.notifications', compact('notifications'));
    })->name('notifications');
});