@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h2>
                    {{ $user->name }}
                </h2>

                <p>
                    {{ optional($user->artisanProfile)->bio }}
                </p>

                @if($user->artisanProfile)

                    <p>
                        <strong>City:</strong>
                        {{ $user->artisanProfile->city }}
                    </p>

                    <p>
                        <strong>Phone:</strong>
                        {{ $user->artisanProfile->phone }}
                    </p>

                @endif

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <h3>
            Artisan Products
        </h3>

        <div class="row">

            @foreach($user->products as $product)

                <div class="col-md-6 mb-3">

                    <div class="card">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="card-img-top"
                                style="height:200px;object-fit:cover;"
                            >

                        @endif

                        <div class="card-body">

                            <h5>
                                {{ $product->title }}
                            </h5>

                            <p>
                                ${{ number_format($product->price,2) }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection