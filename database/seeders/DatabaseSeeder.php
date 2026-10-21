<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BrandSeeder::class); // Твои реальные марки из ЛР №4

        Car::factory(40)->recycle(Brand::all())->create(); // 40 сгенерированных авто
    }
}