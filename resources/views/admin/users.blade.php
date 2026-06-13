@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

<h1 class="mb-4">
    Manage Users
</h1>

<div class="card shadow">

    <div class="card-body">

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

                        <form
                            action="/admin/users/{{ $user->id }}/toggle-role"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-sm btn-warning"
                            >

                                @if($user->role === 'admin')

                                    Demote

                                @else

                                    Promote

                                @endif

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

    {{ $users->links() }}

</div>

@endsection