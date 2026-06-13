@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')

<h1 class="mb-4">
    Manage Products
</h1>

<div class="card shadow">

    <div class="card-body">

    <div class="card shadow mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="/admin/products"
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
                                @selected(
                                    request('category')
                                    == $category->id
                                )
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-2 d-flex gap-2">

                    <button
                        class="btn btn-primary flex-fill"
                    >
                        Filter
                    </button>

                    <a
                        href="/admin/products"
                        class="btn btn-outline-secondary flex-fill"
                    >
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

        <table class="table table-striped align-middle">

            <thead>

                <tr>

                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Artisan</th>
                    <th>Price</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($products as $product)

                <tr>

                    <td>

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                width="60"
                                height="60"
                                style="object-fit:cover;"
                            >

                        @else

                            -

                        @endif

                    </td>

                    <td>
                        {{ $product->title }}
                    </td>

                    <td>
                        {{ $product->category->name }}
                    </td>

                    <td>
                        {{ $product->artisan->name }}
                    </td>

                    <td>
                        ${{ number_format($product->price,2) }}
                    </td>

                        <td>

                            <a
                                href="/products/{{ $product->id }}"
                                class="btn btn-primary btn-sm"
                            >
                                View
                            </a>

                            <form
                                action="/admin/products/{{ $product->id }}"
                                method="POST"
                                class="d-inline delete-form"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>
                                            

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="d-flex justify-content-center mt-4">

    {{ $products->links() }}

</div>

@endsection