<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Главная страница / Каталог автомобилей
Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// PDF-каталог
Route::get('/cars-pdf', [CarController::class, 'pdf'])->name('cars.pdf');

// --- Аутентификация и Регистрация ---

// Форма входа
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Обработка входа
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/profile');
    }

    return back()->withErrors([
        'email' => 'Неверный email или пароль.',
    ]);
});

// Форма регистрации
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Обработка регистрации
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // Обычный пользователь
    ]);

    auth()->login($user);

    return redirect('/profile');
})->name('register.store');

// Выход из системы
Route::post('/logout', function (Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

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
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.status');

    Route::get('/notifications', function () {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('admin.notifications', compact('notifications'));
    })->name('notifications');
});