<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [

            'title' => fake()->words(
                3,
                true
            ),

            'description' => fake()->paragraph(),

            'price' => fake()->numberBetween(
                50,
                5000
            ),

            'category_id' => Category::inRandomOrder()
                ->first()
                ->id,

            'user_id' => User::where(
                    'role',
                    'artisan'
                )
                ->inRandomOrder()
                ->first()
                ->id,

        ];
    }
}