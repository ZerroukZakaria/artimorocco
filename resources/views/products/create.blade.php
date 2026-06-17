@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <i
                        class="bi bi-box-seam text-primary"
                        style="font-size: 3rem;"
                    ></i>

                    <h1 class="fw-bold mt-3">
                        Create Product
                    </h1>

                    <p class="text-muted">
                        Add a new handmade product to your artisan shop.
                    </p>

                </div>

                <form
                    method="POST"
                    action="/products"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Product Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control form-control-lg"
                            placeholder="e.g. Handmade Moroccan Carpet"
                            value="{{ old('title') }}"
                        >

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control"
                            placeholder="Describe your product..."
                        >{{ old('description') }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Price ($)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="form-control"
                                value="{{ old('price') }}"
                            >

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Category
                            </label>

                            <select
                                name="category_id"
                                class="form-select"
                            >

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Product Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                        >

                        <div class="form-text">
                            JPG, PNG or WEBP recommended.
                        </div>

                    </div>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-dark btn-lg"
                        >
                            <i class="bi bi-plus-circle me-2"></i>
                            Create Product
                        </button>

                        <a
                            href="/dashboard/products"
                            class="btn btn-outline-secondary btn-lg"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection