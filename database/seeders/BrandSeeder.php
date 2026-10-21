<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Toyota', 'description' => 'Японские надежные автомобили', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BMW', 'description' => 'Немецкие спортивные автомобили', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mercedes-Benz', 'description' => 'Премиальные немецкие автомобили', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tesla', 'description' => 'Электромобили нового поколения', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}