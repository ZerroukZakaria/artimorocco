<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(100)
            ->create([
                'role' => 'artisan'
            ]);
        Product::factory()
            ->count(300)
            ->create();


        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        

    }
}
