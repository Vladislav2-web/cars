<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'user_id', // Добавили поле автора записи
        'title',
        'year',
        'price',
        'description',
        'is_available',
        'cover',
    ];

    // Аксессор для получения корректного URL картинки или заглушки
protected function coverUrl(): Attribute
{
    return Attribute::get(fn () => $this->cover
        ? asset('storage/' . $this->cover)
        : asset('images/no-cover.png'));
}

    // Связь с маркой автомобиля
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Связь с пользователем (автором записи)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}