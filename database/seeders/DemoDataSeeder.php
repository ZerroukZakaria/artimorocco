<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory()
        //     ->count(100)
        //     ->create([
        //         'role' => 'artisan'
        //     ]);

        Product::factory()
            ->count(300)
            ->create();

                    $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}