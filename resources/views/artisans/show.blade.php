@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="card shadow-sm border-0 mb-5">

    <div class="card-body p-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="d-flex align-items-center mb-3">

                    <div
                        class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width:80px;height:80px;font-size:2rem;"
                    >
                        <i class="bi bi-person"></i>
                    </div>

                    <div>

                        <h1 class="mb-0">
                            {{ $user->name }}
                        </h1>

                        <small class="text-muted">
                            Moroccan Artisan
                        </small>

                    </div>

                </div>

                <p class="lead">

                    {{ optional($user->artisanProfile)->bio
                        ?: 'This artisan has not added a biography yet.' }}

                </p>

            </div>

            <div class="col-lg-4">

                <div class="card bg-light border-0">

                    <div class="card-body">

                        <h5 class="mb-3">
                            Contact Information
                        </h5>

                        <p>

                            <i class="bi bi-geo-alt-fill me-2"></i>

                            {{ optional($user->artisanProfile)->city
                                ?: 'Not specified' }}

                        </p>

                        <p class="mb-0">

                            <i class="bi bi-telephone-fill me-2"></i>

                            {{ optional($user->artisanProfile)->phone
                                ?: 'Not specified' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="mb-0">
        Products by {{ $user->name }}
    </h2>

    <span class="badge bg-dark fs-6">

        {{ $user->products->count() }}

        Products

    </span>

</div>

<div class="row">

    @forelse($user->products as $product)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card h-100 shadow-sm product-card">

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;"
                    >

                @else

                    <img
                        src="https://placehold.co/600x400"
                        class="card-img-top"
                        style="height:250px;object-fit:cover;"
                    >

                @endif

                <div class="card-body">

                    <span class="badge bg-secondary mb-2">
                        {{ $product->category->name }}
                    </span>

                    <h5>
                        {{ $product->title }}
                    </h5>

                    <h6 class="text-success">

                        ${{ number_format($product->price,2) }}

                    </h6>

                </div>

                <div class="card-footer bg-white border-0">

                    <a
                        href="/products/{{ $product->id }}"
                        class="btn btn-dark w-100"
                    >
                        View Product
                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="alert alert-info">

                This artisan has not published any products yet.

            </div>

        </div>

    @endforelse

</div>

@endsection