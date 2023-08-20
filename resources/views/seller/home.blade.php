
@extends('layouts.master')

@section('title', 'Home')


@section('content')

<br>
<h2 class="float-left">Products</h2>
<a class="btn btn-primary" href="">
    <i class="fa fa-plus"></i> Add
</a>

<hr>
<div class="row">
    @foreach ($products as $product)
    <div class='col-6 col-md-3'>
        <a href="{{ route('product', $product->slug) }}" style='text-decoration: none; color: black' class='card'>
            <img src='/images/products/{{ json_decode($product->images, true)[0] }}' alt='{{ $product->name }}' class="img-fluid" >
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

@endsection

