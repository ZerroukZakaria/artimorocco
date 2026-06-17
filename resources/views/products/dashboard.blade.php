@extends('layouts.app')

@section('title', 'My Products')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1 class="fw-bold mb-1">
            My Products
        </h1>

        <p class="text-muted fs-5 mb-0">
            Create, manage and showcase your handmade creations.
        </p>

    </div>

    <a
        href="/products/create"
        class="btn btn-dark"
    >
        <i class="bi bi-plus-circle me-2"></i>
        Add Product
    </a>

</div>

<div class="row mb-5">

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <i
                    class="bi bi-box-seam text-primary"
                    style="font-size: 3rem;"
                ></i>

                <h1 class="fw-bold mt-2">
                    {{ $products->count() }}
                </h1>

                <p class="text-muted mb-0">
                    Products
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

@forelse($products as $product)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card shadow-sm border-0 h-100 product-card">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    class="card-img-top"
                    style="height:250px;object-fit:cover;"
                    alt="{{ $product->title }}"
                >

            @else

                <img
                    src="https://placehold.co/600x400?text=ArtiMorocco"
                    class="card-img-top"
                    style="height:250px;object-fit:cover;"
                    alt="{{ $product->title }}"
                >

            @endif

            <div class="card-body">

                <span class="badge bg-secondary mb-2">
                    {{ $product->category->name }}
                </span>

                <h5 class="fw-bold">
                    {{ $product->title }}
                </h5>

                <h4 class="text-success mb-3">
                    ${{ number_format($product->price, 2) }}
                </h4>

            </div>

            <div class="card-footer bg-white border-0">

<div class="d-flex gap-2">

    <a
        href="/products/{{ $product->id }}"
        class="btn btn-outline-dark flex-fill"
    >
        View
    </a>

    <a
        href="/products/{{ $product->id }}/edit"
        class="btn btn-outline-secondary flex-fill"
    >
        Edit
    </a>

</div>

<form
    action="/products/{{ $product->id }}"
    method="POST"
    class="delete-form mt-2"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-dark w-100"
    >
        Delete
    </button>

</form>

            </div>

        </div>

    </div>

@empty

    <div class="col-12">

        <div class="alert alert-info shadow-sm">

            <h5 class="mb-2">
                No products yet
            </h5>

            <p class="mb-3">
                Start showcasing your craftsmanship by creating your first product.
            </p>

            <a
                href="/products/create"
                class="btn btn-primary"
            >
                Create Product
            </a>

        </div>

    </div>

@endforelse

</div>

@endsection

<script>

document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.delete-form')
        .forEach(form => {

            form.addEventListener('submit', function(e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Delete Product?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });

});

</script>