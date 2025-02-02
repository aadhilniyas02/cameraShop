<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create 5 users
        $users = User::factory(10)->create();

        // create 20 products
        $products = Product::factory(20)->create();


        // create carts for users with random products
        foreach ($users as $user) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $products->random()->id,
                    'product_quantity' => rand(1,3) // Random quantity between 1 and 3
                ]);
            }
        }
    }
}
