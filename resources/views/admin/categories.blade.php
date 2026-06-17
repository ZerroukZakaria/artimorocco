@extends('layouts.app')

@section('title', 'Manage Categories')

@section('content')

<h1 class="fw-bold mb-4">
    Manage Categories
</h1>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <i
                    class="bi bi-tags fs-1 text-dark"
                ></i>

                <h2 class="fw-bold mt-2">
                    {{ $categories->total() }}
                </h2>

                <p class="text-muted mb-0">
                    Categories
                </p>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Create Category
        </h5>

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="/admin/categories"
        >

            @csrf

            <div class="row">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Category name"
                        required
                    >

                </div>

                <div class="col-md-2">

                    <button
                        class="btn btn-dark w-100"
                    >
                        <i class="bi bi-plus-circle me-1"></i>
                        Create
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form
            method="GET"
            action="/admin/categories"
            class="mb-4"
        >

            <div class="row">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search categories..."
                        value="{{ request('search') }}"
                    >

                </div>

                <div class="col-md-2 d-flex gap-2">

                    <button
                        class="btn btn-primary flex-fill"
                    >
                        Search
                    </button>

                    <a
                        href="/admin/categories"
                        class="btn btn-outline-secondary"
                    >
                        Reset
                    </a>

                </div>

            </div>

        </form>

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($categories as $category)

                <tr>

                    <td>
                        {{ $category->id }}
                    </td>

                    <td class="fw-semibold">
                        {{ $category->name }}
                    </td>

                    <td>

                        <span class="badge bg-dark">

                            {{ $category->products_count }}

                        </span>

                    </td>

                    <td>

                            <div class="d-flex gap-2">
<button
    class="btn btn-outline-secondary btn-sm"
    data-bs-toggle="modal"
    data-bs-target="#editCategory{{ $category->id }}"
>
    <i class="bi bi-pencil-square"></i>
</button>

<button
    class="btn btn-outline-danger btn-sm"
>
    <i class="bi bi-trash"></i>
</button>

                                </form>

                            </div>

                    </td>

                </tr>

                <div
                    class="modal fade"
                    id="editCategory{{ $category->id }}"
                    tabindex="-1"
                >

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <form
                                action="/admin/categories/{{ $category->id }}"
                                method="POST"
                            >

                                @csrf
                                @method('PUT')

                                <div class="modal-header">

                                    <h5 class="modal-title">
                                        Edit Category
                                    </h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                    ></button>

                                </div>

                                <div class="modal-body">

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ $category->name }}"
                                        required
                                    >

                                </div>

                                <div class="modal-footer">

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        Cancel
                                    </button>

                                    <button
                                        type="submit"
                                        class="btn btn-dark"
                                    >
                                        Save Changes
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <tr>

                    <td
                        colspan="4"
                        class="text-center text-muted py-4"
                    >
                        No categories found.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="d-flex justify-content-center mt-4">

    {{ $categories->links() }}

</div>

@endsection

<script>

document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.delete-form')
        .forEach(form => {

            form.addEventListener('submit', function(e) {

                e.preventDefault();

                Swal.fire({
                    title: 'Delete Category?',
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