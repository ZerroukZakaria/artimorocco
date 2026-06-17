@extends('layouts.app')

@section('title', 'Register')

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
                        <i class="bi bi-person-plus"></i>
                    </div>

                    <h1 class="h2 mb-2">
                        Artisan Registration
                    </h1>

                    <p class="text-muted">
                        Join ArtiMorocco and showcase your handmade creations.
                    </p>

                </div>

                <form
                    method="POST"
                    action="/register"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                        >

                    </div>

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

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Choose a password"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm your password"
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success w-100"
                    >
                        <i class="bi bi-person-check me-2"></i>
                        Create Account
                    </button>

                </form>

                <hr class="my-4">

                <div class="text-center">

                    <span class="text-muted">
                        Already have an account?
                    </span>

                    <a
                        href="/login"
                        class="text-decoration-none"
                    >
                        Login
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection