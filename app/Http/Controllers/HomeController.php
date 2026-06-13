<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

    
        $featuredProducts = Product::with('category')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::all();

        $artisans = User::where('role', 'artisan')
            ->take(4)
            ->get();

        $productCount = Product::count();
        $artisanCount = User::where(
            'role',
            'artisan'
        )->count();
        $categoryCount = Category::count();


        return view(
            'home',
            compact(
                'featuredProducts',
                'categories',
                'artisans',
                'productCount',
                'artisanCount',
                'categoryCount'
            )
        );
    }
}