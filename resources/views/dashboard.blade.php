@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1>Welcome, {{ auth()->user()->name }}</h1>

<p>Role: {{ auth()->user()->role }}</p>

<form action="/logout" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">
        Logout
    </button>
</form>

@endsection