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
            'name' => fake()->words(3,true),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->sentence(15),
            'price_cents' => fake()->numberBetween(5000, 500000),
            'stock' => fake()->numberBetween(0, 20),
            'images' => ['/img/placeholder.jpg'],            
        ];
    }
}
