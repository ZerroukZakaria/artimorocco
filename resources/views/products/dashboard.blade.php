@extends('layouts.app')

@section('title', 'My Products')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h1>My Products</h1>

    <a
        href="/products/create"
        class="btn btn-primary"
    >
        Add Product
    </a>

</div>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    @foreach($products as $product)

        <tr>

            <td>
                {{ $product->title }}
            </td>

            <td>
                ${{ number_format($product->price, 2) }}
            </td>

            <td>
                {{ $product->category->name }}
            </td>

            <td>

                <a
                    href="/products/{{ $product->id }}/edit"
                    class="btn btn-warning btn-sm"
                >
                    Edit
                </a>

                <form
                    action="/products/{{ $product->id }}"
                    method="POST"
                    class="d-inline delete-form"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
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