@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

<h1>Create Product</h1>

<form
    method="POST"
    action="/products"
    enctype="multipart/form-data"
>

    @csrf

    @include('products._form')

    <button class="btn btn-primary">
        Create Product
    </button>

</form>

@endsection