
@extends('layouts.master')

@section('title', 'Seller Space')


@section('content')

<br>
<div class="row">
    <div class="col-11">Products</div>
    <div class="col">
        <a class="btn btn-primary" href="{{ route('seller.add-product') }}">
            <i class="fa fa-plus"></i> Add
        </a>
    </div>
</div>


<hr>
<div class="row">
    @foreach ($products as $product)
    <div class='col-6 col-md-3'>
        <a href="{{ route('seller.edit-product', $product->slug) }}" style='text-decoration: none; color: black' class='card'>
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

