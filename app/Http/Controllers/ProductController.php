<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::with([
            'category',
            'artisan'
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
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view(
            'products.index',
            compact(
                'products',
                'categories'
            )
        );
    }


    public function create()
    {
        $categories = Category::all();

        return view(
            'products.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);


        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'products',
                    'public'
                );

        }

        Product::create([

            'title' => $request->title,

            'description' => $request->description,

            'price' => $request->price,

            'image' => $imagePath,

            'category_id' => $request->category_id,

            'user_id' => auth()->id(),

        ]);

        return redirect('/dashboard/products')
        ->with(
            'success',
            'Product created successfully.'
        );

    }

    public function dashboard()
    {
        $products = Product::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'products.dashboard',
            compact('products')
        );
    }

    public function edit(Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403);
    }

    $categories = Category::all();

    return view(
        'products.edit',
        compact('product', 'categories')
    );
}


    public function update(
        Request $request,
        Product $product
    )
    {
        if ($product->user_id !== auth()->id()) {
            abort(403);
        }

            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric|min:1',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|max:2048',
            ]);

        if ($request->hasFile('image')) {

        $imagePath = $request
            ->file('image')
            ->store(
                'products',
                'public'
            );

        $product->image = $imagePath;
    }


        // $product->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        // ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect('/dashboard/products')
        ->with(
            'success',
            'Product updated successfully.'
        );
    }


    public function destroy(Product $product)
    {
        if ($product->user_id !== auth()->id()) {
            abort(403);
        }

        $product->delete();

        return redirect('/dashboard/products')
            ->with(
                'success',
                'Product deleted successfully.'
            );
    }

    public function show(Product $product)
    {
        $product->load([
            'category',
            'artisan'
        ]);

        return view(
            'products.show',
            compact('product')
        );
    }

}