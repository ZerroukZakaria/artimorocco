@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="text-center mb-5">

    <h1 class="display-5 fw-bold">
        Explore Moroccan Crafts
    </h1>

    <p class="text-muted">
        Discover authentic handmade products from talented Moroccan artisans.
    </p>

</div>

<form method="GET" action="/products">

    <div class="card shadow-sm border-0 mb-5">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search products..."
                        value="{{ request('search') }}"
                    >

                </div>

                <div class="col-md-5">

                    <select
                        name="category"
                        class="form-select"
                    >

                        <option value="">
                            All Categories
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(request('category') == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2 d-flex gap-2">

                    <button
                        class="btn btn-dark flex-fill"
                    >
                        Filter
                    </button>

                    <a
                        href="/products"
                        class="btn btn-outline-secondary flex-fill"
                    >
                        Reset
                    </a>

                </div>

            </div>

        </div>

    </div>

</form>

<div class="row g-4">

@forelse($products as $product)

    <div class="col-lg-3 col-md-6">

        <div class="card border-0 shadow-sm h-100">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    class="card-img-top"
                    alt="{{ $product->title }}"
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

                <p class="text-muted small">

                    {{ Str::limit($product->description, 60) }}

                </p>

                <h4 class="fw-bold">

                    ${{ number_format($product->price, 2) }}

                </h4>

            </div>

            <div class="card-footer bg-white border-0">

                <div class="d-grid gap-2">

                    <a
                        href="/products/{{ $product->id }}"
                        class="btn btn-dark"
                    >
                        View Details
                    </a>

                    <a
                        href="/artisans/{{ $product->artisan->id }}"
                        class="btn btn-outline-secondary"
                    >
                        {{ $product->artisan->name }}
                    </a>

                </div>

            </div>

        </div>

    </div>

@empty

    <div class="col-12">

        <div class="alert alert-info">

            No products found.

        </div>

    </div>

@endforelse

</div>

<div class="d-flex justify-content-center mt-5">

    {{ $products->links() }}
    

</div>



@endsection