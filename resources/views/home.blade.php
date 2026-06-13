@extends('layouts.app')

@section('title', 'ArtiMorocco')

@section('content')

<div class="bg-dark text-white rounded p-5 mb-5 text-center">


<h1 class="display-3 fw-bold mb-3">
    Discover Authentic Moroccan Craftsmanship
</h1>

<p class="lead mb-4">
    Explore handmade carpets, ceramics, jewelry, leather goods and more,
    crafted by talented artisans across Morocco.
</p>

<div class="d-flex justify-content-center gap-3">

    <a
        href="/products"
        class="btn btn-warning btn-lg"
    >
        Browse Products
    </a>

    <a
        href="#featured-products"
        class="btn btn-outline-light btn-lg"
    >
        Featured Products
    </a>

</div>


</div>

<hr>

<div class="row text-center mb-5">


<div class="col-md-4">

    <h2>{{ $productCount }}</h2>

    <p>Products</p>

</div>

<div class="col-md-4">

    <h2>{{ $artisanCount }}</h2>

    <p>Artisans</p>

</div>

<div class="col-md-4">

    <h2>{{ $categoryCount }}</h2>

    <p>Categories</p>

</div>


</div>

<hr>

<h2 class="mb-4 text-center fw-bold">
    Categories
</h2>

<div class="row mb-5">

@foreach($categories as $category)


<div class="col-md-4 mb-3">

    <a
        href="/products?category={{ $category->id }}"
        class="text-decoration-none"
    >

        <div
            class="card text-center shadow-sm border-0 h-100"
        >

            <div class="card-body py-4">

                <h5 class="fw-bold mb-0 text-dark">
                    {{ $category->name }}
                </h5>

            </div>

        </div>

    </a>

</div>


@endforeach

</div>

<hr>

<h2
    class="mb-4 text-center fw-bold"
    id="featured-products"
>
    Featured Products
</h2>

<div class="row g-4 mb-5">

@foreach($featuredProducts as $product)


<div class="col-lg-3 col-md-6">

    <div class="card border-0 shadow-sm h-100">

        @if($product->image)

            <img
                src="{{ asset('storage/' . $product->image) }}"
                class="card-img-top"
                style="
                    height:280px;
                    object-fit:cover;
                "
            >

        @endif

        <div class="card-body text-center">

            <span
                class="badge bg-secondary mb-2"
            >
                {{ $product->category->name }}
            </span>

            <h5 class="fw-bold">
                {{ $product->title }}
            </h5>

            <p class="text-muted">
                ${{ number_format($product->price,2) }}
            </p>

            <a
                href="/products/{{ $product->id }}"
                class="btn btn-dark w-100"
            >
                View Details
            </a>

        </div>

    </div>

</div>


@endforeach

</div>

<div class="text-center mb-5">


<a
    href="/products"
    class="btn btn-outline-dark btn-lg"
>
    View All Products
</a>


</div>

<hr>

<h2 class="mb-4 text-center fw-bold">
    Our Artisans
</h2>

<div class="row justify-content-center mb-5">

@foreach($artisans as $artisan)


<div class="col-md-3 mb-3">

    <div
        class="card text-center border-0 shadow-sm h-100"
    >

        <div class="card-body">

            <h5 class="fw-bold">
                {{ $artisan->name }}
            </h5>

            <a
                href="/artisans/{{ $artisan->id }}"
                class="btn btn-outline-dark btn-sm"
            >
                View Profile
            </a>

        </div>

    </div>

</div>


@endforeach

</div>

<div class="bg-light rounded p-5 text-center mt-5">


<h2>
    Are You an Artisan?
</h2>

<p class="lead">
    Join ArtiMorocco and showcase your creations to a wider audience.
</p>

<a
    href="/register"
    class="btn btn-primary btn-lg"
>
    Become an Artisan
</a>


</div>

@endsection
