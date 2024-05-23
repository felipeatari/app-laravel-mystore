<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'cover' => fake()->imageUrl(),
            'price' => fake()->randomFloat(1, 20, 30),
            'description' => fake()->sentence(),
            'stock' => fake()->randomDigit(),
        ];
    }
}
