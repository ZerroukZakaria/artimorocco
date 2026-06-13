@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<h1>My Artisan Profile</h1>

<form
    method="POST"
    action="/dashboard/profile"
>

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>
            Bio
        </label>

        <textarea
            name="bio"
            class="form-control"
        >{{ $profile->bio ?? '' }}</textarea>

    </div>

    <div class="mb-3">

        <label>
            City
        </label>

        <input
            type="text"
            name="city"
            class="form-control"
            value="{{ $profile->city ?? '' }}"
        >

    </div>

    <div class="mb-3">

        <label>
            Phone
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ $profile->phone ?? '' }}"
        >

    </div>

    <button
        class="btn btn-primary"
    >
        Save Profile
    </button>

</form>

@endsection