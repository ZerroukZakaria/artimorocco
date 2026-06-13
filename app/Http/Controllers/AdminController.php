<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [

            'usersCount' =>
                User::count(),

            'artisansCount' =>
                User::where(
                    'role',
                    'artisan'
                )->count(),

            'productsCount' =>
                Product::count(),

            'categoriesCount' =>
                Category::count(),

            'recentUsers' =>
                User::latest()
                    ->take(5)
                    ->get(),

            'recentProducts' =>
                Product::with([
                    'artisan',
                    'category'
                ])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }


    public function users()
    {
        $users = User::latest()
            ->paginate(15);

        return view(
            'admin.users',
            compact('users')
        );
    }



    public function toggleRole(User $user)
    {
        if ($user->id === auth()->id()) {

            return back()->with(
                'error',
                'You cannot change your own role.'
            );

        }

        $user->role =
            $user->role === 'admin'
            ? 'artisan'
            : 'admin';

        $user->save();

        return back()->with(
            'success',
            'User role updated.'
        );
    }

public function categories()
{
    $categories = Category::withCount('products')
        ->latest()
        ->paginate(10);

    return view(
        'admin.categories',
        compact('categories')
    );
}

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return back()->with(
            'success',
            'Category created successfully.'
        );
    }

    public function updateCategory(
    Request $request,
    Category $category
)
{
    $request->validate([
        'name' => 'required|max:255'
    ]);

    $category->update([
        'name' => $request->name
    ]);

    return back()->with(
        'success',
        'Category updated successfully.'
    );
}


public function destroyCategory(
    Category $category
)
{
    $category->delete();

    return back()->with(
        'success',
        'Category deleted successfully.'
    );
}

public function products(Request $request)
{
    $query = Product::with([
        'artisan',
        'category'
    ]);

    if ($request->filled('search')) {

        $query->where(
            'title',
            'like',
            '%' . $request->search . '%'
        );

    }

    if ($request->filled('category')) {

        $query->where(
            'category_id',
            $request->category
        );

    }

    $products = $query
        ->latest()
        ->paginate(15)
        ->withQueryString();

    $categories = Category::all();

    return view(
        'admin.products',
        compact(
            'products',
            'categories'
        )
    );
}

public function destroyProduct(
    Product $product
)
{
    $product->delete();

    return back()->with(
        'success',
        'Product deleted successfully.'
    );
}




}