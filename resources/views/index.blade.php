@extends('layouts.master')

@section('title', 'ShirtStore')


@section('content')

<div class="p-4 text-center text-light" style="background-color: rgba(0, 0, 0, 0.26); height: 100vh;">
    <h1 class="p-5" style="font-family: cursive; text-decoration: underline;">ShirtStore</h1>
    <div class="row" style="margin-bottom: 100px;">
        @foreach ($products as $product)
            <div class='col-sm-12 col-md-3'>
                <a href="{{ route('product', $product->slug) }}" style='text-decoration: none; color: black' class='card'>
                    <img src='images/products/{{ json_decode($product->images, true)[0] }}' alt='{{ $product->name }}' class="img-fluid" style="height: 400px;">
                    <div class='card-body' style='text-align: center'>
                        <h5 class='card-title'>{{ $product->name }}</h5>
                        <del>{{ $product->old_price }}</del>
                        <h2 class="text-primary">{{ $product->price }}</h2>
                    </div>
                </a>
                <br>
            </div>
        @endforeach
    </div>
</div>

<style>
    body {
        background-image: url("{{ asset('images/back.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

@endsection
