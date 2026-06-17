@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                Manage Products
            </h1>

            <p class="text-muted mb-0">
                {{ $products->total() }} products in marketplace
            </p>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                method="GET"
                action="/admin/products"
                class="mb-4"
            >

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
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>

                        <a
                            href="/admin/products"
                            class="btn btn-outline-secondary"
                        >
                            Reset
                        </a>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Artisan</th>
                            <th>Price</th>
                            <th width="150">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>

                                <img
                                    src="{{ $product->image
                                        ? asset('storage/' . $product->image)
                                        : 'https://placehold.co/60x60?text=No+Image' }}"
                                    width="60"
                                    height="60"
                                    class="rounded border"
                                    style="object-fit:cover;"
                                >

                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $product->title }}
                                </div>

                            </td>

                            <td>

                                <span class="badge bg-secondary">
                                    {{ $product->category->name }}
                                </span>

                            </td>

                            <td>

                                {{ $product->artisan->name }}

                            </td>

                            <td class="fw-semibold text-success">

                                ${{ number_format($product->price, 2) }}

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a
                                        href="/products/{{ $product->id }}"
                                        class="btn btn-outline-primary btn-sm"
                                        title="View Product"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <form
                                        action="/admin/products/{{ $product->id }}"
                                        method="POST"
                                        class="delete-form"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            title="Delete Product"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted py-5"
                            >

                                <i class="bi bi-box-seam fs-1 d-block mb-2"></i>

                                No products found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="d-flex justify-content-center mt-4">

        {{ $products->links() }}

    </div>

</div>

@endsection

@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form')
        .forEach(form => {

            form.addEventListener('submit', function (e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Delete Product?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
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

@endsection