<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cars')->insert([
            ['brand_id' => 1, 'title' => 'Toyota Camry', 'year' => 2023, 'price' => 15000000.00, 'description' => 'Комфортный седан', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 1, 'title' => 'Toyota RAV4', 'year' => 2022, 'price' => 18000000.00, 'description' => 'Популярный кроссовер', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'title' => 'BMW X5', 'year' => 2023, 'price' => 35000000.00, 'description' => 'Мощный внедорожник', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'title' => 'BMW M3', 'year' => 2021, 'price' => 32000000.00, 'description' => 'Спортивный автомобиль', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 3, 'title' => 'Mercedes-Benz E-Class', 'year' => 2023, 'price' => 30000000.00, 'description' => 'Бизнес-класс', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 3, 'title' => 'Mercedes-Benz GLC', 'year' => 2022, 'price' => 27000000.00, 'description' => 'Премиум кроссовер', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 4, 'title' => 'Tesla Model S', 'year' => 2023, 'price' => 40000000.00, 'description' => 'Электрический седан', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 4, 'title' => 'Tesla Model Y', 'year' => 2022, 'price' => 25000000.00, 'description' => 'Электрический кроссовер', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 1, 'title' => 'Toyota Corolla', 'year' => 2020, 'price' => 9000000.00, 'description' => 'Надежный городской авто', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'title' => 'BMW 3 Series', 'year' => 2021, 'price' => 20000000.00, 'description' => 'Динамичный седан', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}