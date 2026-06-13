@extends('layouts.app')

@section('title', $product->title)

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="row g-5">

            <div class="col-lg-6">

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        class="img-fluid rounded"
                        style="width:100%;height:500px;object-fit:cover;"
                        alt="{{ $product->title }}"
                    >

                @else

                    <img
                        src="https://placehold.co/800x600"
                        class="img-fluid rounded"
                        style="width:100%;height:500px;object-fit:cover;"
                        alt="{{ $product->title }}"
                    >

                @endif

            </div>

            <div class="col-lg-6">

                <span class="badge bg-secondary mb-3">
                    {{ $product->category->name }}
                </span>

                <h1 class="fw-bold mb-3">
                    {{ $product->title }}
                </h1>

                <h2 class="text-success mb-4">
                    ${{ number_format($product->price, 2) }}
                </h2>

                <p class="lead">
                    {{ $product->description }}
                </p>

                <hr class="my-4">

                <div class="card bg-light border-0">

                    <div class="card-body">

                        <h5>
                            Artisan Information
                        </h5>

                        <p class="mb-2">

                            <strong>
                                {{ $product->artisan->name }}
                            </strong>

                        </p>

                        <a
                            href="/artisans/{{ $product->artisan->id }}"
                            class="btn btn-outline-dark"
                        >
                            View Artisan Profile
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection