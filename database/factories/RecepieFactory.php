<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recepie;

class RecepieFactory extends Factory
{
    protected $model = Recepie::class;

    public function definition(): array
    {
        return [
            'recepie_name' => fake()->words(2, true),
            'price' => fake()->numberBetween(100, 500),
            'description' => fake()->sentence(),
            'ingredients' => fake()->paragraph(),
        ];
    }
}