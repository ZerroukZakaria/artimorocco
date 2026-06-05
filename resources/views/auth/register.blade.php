@extends('layouts.app')

@section('title', 'Register')

@section('content')

<h1>Artisan Registration</h1>

<form method="POST" action="/register">
    @csrf

    <div class="mb-3">
        <input
            type="text"
            name="name"
            class="form-control"
            placeholder="Full Name"
        >
    </div>

    <div class="mb-3">
        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Email"
        >
    </div>

    <div class="mb-3">
        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
        >
    </div>

    <div class="mb-3">
        <input
            type="password"
            name="password_confirmation"
            class="form-control"
            placeholder="Confirm Password"
        >
    </div>

    <button type="submit" class="btn btn-success">
        Create Account
    </button>
</form>

<p class="mt-3">
    Already have an account?
    <a href="/login">Login</a>
</p>

@endsection