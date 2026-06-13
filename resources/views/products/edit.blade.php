@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<h1>Edit Product</h1>

<form
    method="POST"
    action="/products/{{ $product->id }}"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    @include('products._form')

    <button
        class="btn btn-success"
    >
        Save Changes
    </button>

</form>

@endsection