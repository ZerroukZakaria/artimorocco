@extends('layouts.app')

@section('title', 'Login')

@section('content')

<h1>Login</h1>

<form method="POST" action="/login">
    @csrf

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

    <button type="submit" class="btn btn-primary">
        Login
    </button>
</form>

<p class="mt-3">
    Don't have an account?
    <a href="/register">Register</a>
</p>

@endsection