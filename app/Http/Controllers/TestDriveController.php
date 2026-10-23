<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\TestDrive;
use Illuminate\Http\Request;

class TestDriveController extends Controller
{
    public function create()
    {
        $cars = Car::all();

        return view('pages.test-drive', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'car_id' => ['nullable', 'integer'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Укажите имя.',
            'phone.required' => 'Укажите телефон.',
            'preferred_date.required' => 'Выберите дату.',
            'preferred_date.after_or_equal' => 'Дата не может быть в прошлом.',
        ]);

        $data['user_id'] = auth()->id();

        TestDrive::create($data);

        return redirect()->route('test-drive')
            ->with('success', 'Заявка отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}