@extends('layouts.app')

@section('title', $product->title)

@section('content')

<div class="row">

    <div class="col-md-6">

    @if($product->image)

        <img
            src="{{ asset('storage/' . $product->image) }}"
            class="img-fluid rounded"
            alt="{{ $product->title }}"
        >

    @else

        <img
            src="https://placehold.co/600x400"
            class="img-fluid rounded"
            alt="{{ $product->title }}"
        >

    @endif

    </div>

    <div class="col-md-6">

        <h1>
            {{ $product->title }}
        </h1>

        <p class="text-muted">
            Category:
            {{ $product->category->name }}
        </p>

        <h3 class="text-success">
            ${{ number_format($product->price, 2) }}
        </h3>

        <p>
            {{ $product->description }}
        </p>

        <hr>

        <h5>
            Artisan Information
        </h5>

        <a
            href="/artisans/{{ $product->artisan->id }}"
        >
            {{ $product->artisan->name }}
        </a>

    </div>

</div>

@endsection