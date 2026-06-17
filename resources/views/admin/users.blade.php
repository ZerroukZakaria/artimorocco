@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

<h1 class="mb-4">
    Manage Users
</h1>

<div class="card shadow">

    

    <div class="card-body">
        <div class="row mb-4">

            <div class="col-md-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h2>{{ $totalUsers }}</h2>

                        <p class="text-muted mb-0">
                            Total Users
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h2>{{ $totalArtisans }}</h2>

                        <p class="text-muted mb-0">
                            Artisans
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h2>{{ $totalAdmins }}</h2>

                        <p class="text-muted mb-0">
                            Admins
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <form
            method="GET"
            action="/admin/users"
            class="mb-4"
        >

            <div class="row">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search users..."
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
                        href="/admin/users"
                        class="btn btn-outline-secondary"
                    >
                        Reset
                    </a>

                </div>

            </div>

        </form>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Role</th>

                    <th>Created</th>

                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($users as $user)

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

                        @if($user->role === 'admin')

                            <span
                                class="badge bg-danger"
                            >
                                Admin
                            </span>

                        @else

                            <span
                                class="badge bg-success"
                            >
                                Artisan
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $user->created_at->format('Y-m-d') }}
                    </td>

                    <td>

                @if(auth()->id() !== $user->id)

                    <form
                        action="/admin/users/{{ $user->id }}/toggle-role"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            class="btn btn-sm btn-outline-dark"
                        >

                            {{ $user->role === 'admin'
                                ? 'Demote'
                                : 'Promote' }}

                        </button>

                    </form>

                    @endif
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="d-flex justify-content-center mt-4">

    {{ $users->links() }}

</div>

@endsection