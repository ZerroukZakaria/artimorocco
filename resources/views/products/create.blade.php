@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

<h1>Create Product</h1>

<form method="POST" action="/products">

    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input
            type="text"
            name="title"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>

        <textarea
            name="description"
            class="form-control"
        ></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>

        <input
            type="number"
            step="0.01"
            name="price"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>

        <select
            name="category_id"
            class="form-control"
        >
            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">
        Create Product
    </button>

</form>

@endsection