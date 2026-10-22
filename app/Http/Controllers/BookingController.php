<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\BookingService;
use App\Mail\BookingReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Notifications\NewBooking;
use Illuminate\Support\Facades\Notification;

// Внутри метода store после создания заявки и отправки письма пользователю:
Notification::send(User::where('role', 'admin')->get(), new NewBooking($booking));
class BookingController extends Controller
{
    // Метод сохранения новой заявки
    public function store(Request $request, Car $car, BookingService $service)
    {
        // 1. Проверяем введенные пользователем данные (телефон и комментарий)
        $data = $request->validate([
            'phone' => ['required', 'regex:/^\+7\d{10}$/'], // Формат: +7XXXXXXXXXX
            'comment' => ['nullable', 'string', 'max:500'],
        ]);

        // 2. Вызываем сервис для создания заявки (сработает бизнес-правило про лимит в 3 заявки)
        $booking = $service->create($request->user(), $car, $data);

        // 3. Отправляем письмо пользователю (так как MAIL_MAILER=log, оно запишется в storage/logs/laravel.log)
        Mail::to($request->user())->send(new BookingReceived($booking));

        // 4. Возвращаем пользователя назад с сообщением об успехе
        return back()->with('success', "Заявка №{$booking->id} успешно отправлена!");
    }
}