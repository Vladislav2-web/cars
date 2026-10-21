<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory(),
            'title' => fake()->word() . ' ' . fake()->numberBetween(2015, 2026),
            'year' => fake()->numberBetween(2015, 2026),
            'price' => fake()->numberBetween(8000000, 45000000),
            'description' => fake()->realText(150),
            'is_available' => fake()->boolean(85), // 85% машин будут в наличии
        ];
    }
}