<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Associate with a Random User
            'product_id' => Product::factory(), // Associate with a Random Product
            'product_quantity' => $this->faker->numberBetween(1, 20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
