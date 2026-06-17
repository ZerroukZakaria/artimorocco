@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <i
                        class="bi bi-pencil-square text-warning"
                        style="font-size: 3rem;"
                    ></i>

                    <h1 class="fw-bold mt-3">
                        Edit Product
                    </h1>

                    <p class="text-muted">
                        Update your product information and keep your shop up to date.
                    </p>

                </div>

                <form
                    method="POST"
                    action="/products/{{ $product->id }}"
                    enctype="multipart/form-data"
                >

                    @csrf
                    @method('PUT')

                    @include('products._form')

                    <div class="d-flex gap-2 mt-4">

                        <button
                            type="submit"
                            class="btn btn-dark btn-lg"
                        >
                            <i class="bi bi-check-circle me-2"></i>
                            Save Changes
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