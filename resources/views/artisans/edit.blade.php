@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card shadow-sm border-0">

            <div class="card-body p-5">

                <div class="d-flex align-items-center mb-4">

                    <div
                        class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width:80px;height:80px;font-size:2rem;"
                    >
                        <i class="bi bi-person"></i>
                    </div>

                    <div>

                        <h1 class="mb-0">
                            My Artisan Profile
                        </h1>

                        <p class="text-muted mb-0">
                            Update your public artisan information.
                        </p>

                    </div>

                </div>

                <hr class="mb-4">

                <form
                    method="POST"
                    action="/dashboard/profile"
                >

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-card-text me-2"></i>
                            Bio

                        </label>

                        <textarea
                            name="bio"
                            rows="5"
                            class="form-control"
                            placeholder="Tell visitors about yourself and your craft..."
                        >{{ $profile->bio ?? '' }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    <i class="bi bi-geo-alt me-2"></i>
                                    City

                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    value="{{ $profile->city ?? '' }}"
                                    placeholder="Casablanca"
                                >

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    <i class="bi bi-telephone me-2"></i>
                                    Phone

                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ $profile->phone ?? '' }}"
                                    placeholder="+212..."
                                >

                            </div>

                        </div>

                    </div>

                    <div class="d-flex justify-content-end">

                        <button
                            class="btn btn-dark px-4"
                        >
                            <i class="bi bi-check-circle me-2"></i>
                            Save Profile
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection