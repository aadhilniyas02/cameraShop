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
            'product_name' => $this->faker->word(),
            'product_detail' => $this->faker->paragraph(),
            'product_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'product_image' => $this->faker->imageUrl(),
            'product_quantity' => $this->faker->numberBetween(1, 20),
        ];
    }
}
