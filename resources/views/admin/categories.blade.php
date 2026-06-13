@extends('layouts.app')

@section('title', 'Manage Categories')

@section('content')

<h1 class="mb-4">
    Manage Categories
</h1>

<div class="card shadow mb-4">

    <div class="card-header">
        Create Category
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
                    >

                </div>

                <div class="col-md-2">

                    <button
                        class="btn btn-success w-100"
                    >
                        Create
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card shadow">

    <div class="card-body">

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($categories as $category)

                <tr>

                    <td>
                        {{ $category->id }}
                    </td>

                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->products_count }}
                    </td>

                        <td>

                            <button
                                class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategory{{ $category->id }}"
                            >
                                Edit
                            </button>

                            <form
                                action="/admin/categories/{{ $category->id }}"
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
                    >

                </div>

                <div class="modal-footer">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
            @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="d-flex justify-content-center mt-4">

    {{ $categories->links() }}

</div>

@endsection