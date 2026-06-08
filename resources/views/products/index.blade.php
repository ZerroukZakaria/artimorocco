@extends('layouts.app')

@section('title', 'Products')

@section('content')

<h1 class="mb-4">Products</h1>

<div class="row">

@forelse($products as $product)

    <div class="col-md-4 mb-4">

        <div class="card h-100">

            <div class="card-body">

                <h5>{{ $product->title }}</h5>

                <p>
                    {{ $product->description }}
                </p>

                <p>
                    <strong>
                        ${{ number_format($product->price, 2) }}
                    </strong>
                </p>

                <span class="badge bg-secondary">
                    {{ $product->category->name }}
                </span>

            </div>

            <div class="card-footer">

                Artisan:
                {{ $product->artisan->name }}

            </div>

        </div>

    </div>

@empty

    <p>No products found.</p>

@endforelse

</div>

@endsection