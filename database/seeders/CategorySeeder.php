<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
    $categories = [

        'Carpets',
        'Pottery',
        'Jewelry',
        'Leather',
        'Woodwork',
        'Textiles',

        'Copperware',
        'Lanterns',
        'Ceramics',
        'Mosaics',
        'Traditional Clothing',
        'Handbags',
        'Decor',
        'Paintings',
        'Calligraphy',
        'Argan Products',
        'Wood Carvings',
        'Metal Crafts',
        'Home Accessories',
        'Gift Items',

    ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category
            ]);
        }
    }
}