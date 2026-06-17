@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5 col-md-8">

        <div class="card shadow-sm border-0">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <div
                        class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width:80px;height:80px;font-size:2rem;"
                    >
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>

                    <h1 class="h2 mb-2">
                        Welcome Back
                    </h1>

                    <p class="text-muted">
                        Login to manage your artisan profile and products.
                    </p>

                </div>

                <form
                    method="POST"
                    action="/login"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                        >

                        @error('email')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                        >

                        @error('password')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login
                    </button>

                </form>

                <hr class="my-4">

                <div class="text-center">

                    <span class="text-muted">
                        Don't have an account?
                    </span>

                    <a
                        href="/register"
                        class="text-decoration-none"
                    >
                        Register
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection