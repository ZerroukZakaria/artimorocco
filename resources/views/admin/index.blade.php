@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<h1 class="mb-4">
    Admin Dashboard
</h1>

<div class="row g-4 mb-5">

    <div class="col-md-3">

        <div class="card bg-primary text-white shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h1>
                            {{ $usersCount }}
                        </h1>

                        <p class="mb-0">
                            Total Users
                        </p>

                    </div>

                    <i
                        class="bi bi-people-fill"
                        style="font-size:3rem;"
                    ></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-success text-white shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h1>
                            {{ $artisansCount }}
                        </h1>

                        <p class="mb-0">
                            Artisans
                        </p>

                    </div>

                    <i
                        class="bi bi-person-badge-fill"
                        style="font-size:3rem;"
                    ></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning text-dark shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h1>
                            {{ $productsCount }}
                        </h1>

                        <p class="mb-0">
                            Products
                        </p>

                    </div>

                    <i
                        class="bi bi-box-seam-fill"
                        style="font-size:3rem;"
                    ></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white shadow">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h1>
                            {{ $categoriesCount }}
                        </h1>

                        <p class="mb-0">
                            Categories
                        </p>

                    </div>

                    <i
                        class="bi bi-tags-fill"
                        style="font-size:3rem;"
                    ></i>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row g-4 mb-5">

    <div class="col-md-4">

        <div class="card shadow h-100">

            <div class="card-body">

                <h4>
                    Manage Users
                </h4>

                <p>
                    View, edit and manage platform users.
                </p>

                <a
                    href="/admin/users"
                    class="btn btn-primary"
                >
                    Users
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow h-100">

            <div class="card-body">

                <h4>
                    Manage Products
                </h4>

                <p>
                    View and manage all products.
                </p>

                <a
                    href="/admin/products"
                    class="btn btn-success"
                >
                    Products
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow h-100">

            <div class="card-body">

                <h4>
                    Manage Categories
                </h4>

                <p>
                    Create, edit and delete categories.
                </p>

                <a
                    href="/admin/categories"
                    class="btn btn-warning"
                >
                    Categories
                </a>

            </div>

        </div>

    </div>

</div>

<div class="card shadow mb-4">

    <div class="card-header">

        <h4 class="mb-0">
            Recent Users
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>

                </tr>

            </thead>

            <tbody>

                @foreach($recentUsers as $user)

                    <tr>

                        <td>
                            {{ $user->id }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>

                            <span
                                class="badge bg-secondary"
                            >
                                {{ $user->role }}
                            </span>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="card shadow">

    <div class="card-header">

        <h4 class="mb-0">
            Recent Products
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Title</th>
                    <th>Category</th>
                    <th>Artisan</th>
                    <th>Price</th>

                </tr>

            </thead>

            <tbody>

                @foreach($recentProducts as $product)

                    <tr>

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

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection