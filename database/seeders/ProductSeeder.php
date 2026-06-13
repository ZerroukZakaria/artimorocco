<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $artisan = User::first();

        Product::create([
            'title' => 'Handmade Moroccan Carpet',
            'description' => 'Traditional handcrafted carpet from Marrakech.',
            'price' => 1200,
            'category_id' => 1,
            'user_id' => $artisan->id,
        ]);

        Product::create([
            'title' => 'Ceramic Vase',
            'description' => 'Hand-painted ceramic vase.',
            'price' => 350,
            'category_id' => 2,
            'user_id' => $artisan->id,
        ]);

        Product::create([
            'title' => 'Silver Berber Necklace',
            'description' => 'Traditional Amazigh jewelry.',
            'price' => 850,
            'category_id' => 3,
            'user_id' => $artisan->id,
        ]);

        Product::create([
            'title' => 'Leather Bag',
            'description' => 'Authentic Moroccan leather bag.',
            'price' => 600,
            'category_id' => 4,
            'user_id' => $artisan->id,
        ]);

        Product::create([
            'title' => 'Wooden Tea Table',
            'description' => 'Handcrafted cedar wood table.',
            'price' => 950,
            'category_id' => 5,
            'user_id' => $artisan->id,
        ]);

        Product::create([
            'title' => 'Traditional Kaftan',
            'description' => 'Elegant handmade Moroccan kaftan.',
            'price' => 1500,
            'category_id' => 6,
            'user_id' => $artisan->id,
        ]);
    }
}