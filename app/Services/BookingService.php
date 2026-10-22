<?php

namespace App\Services;

use App\Contracts\SmsSender;
use App\Models\Car;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class BookingService
{
    public function __construct(private SmsSender $sms) {}

    public function create(User $user, Car $car, array $data): Booking
    {
        $activeCount = $user->bookings()->where('status', 'new')->count();
        if ($activeCount >= 3) {
            throw ValidationException::withMessages([
                'phone' => 'У вас уже есть 3 активные необработанные заявки на тест-драйв.',
            ]);
        }

        $booking = $user->bookings()->create($data + [
            'car_id' => $car->id,
        ]);

        // Отправка SMS через внедренный интерфейс
        $this->sms->send($data['phone'], "Заявка №{$booking->id} принята");

        return $booking;
    }
}