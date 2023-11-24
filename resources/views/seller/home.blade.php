
@extends('layouts.master')

@section('title', 'Seller Space')


@section('content')

<br>
<div class="row">
    <div class="col-11"><h2>Products</h2></div>
    <div class="col">
        <a class="btn btn-primary" href="{{ route('seller.add-product') }}">
            <i class="fa fa-plus"></i> Add
        </a>
    </div>
</div>


<hr>
<div class="row" style="margin-bottom: 100px;">
    @foreach ($products as $product)
    <div class='col-6 col-md-3'>
        <div class="card">
            <a href="{{ route('seller.edit-product', $product->slug) }}" style='text-decoration: none; color: black'>
                <img src='/images/products/{{ json_decode($product->images, true)[0] }}' alt='{{ $product->name }}' style="max-height: 400px;" >
                <div class='card-body' style='text-align: center'>
                    <h5 class='card-title'>{{ $product->name }}</h5>
                    <del>{{ $product->old_price }}</del>
                    <h2 class="text-primary">{{ $product->price }}</h2>
                </div>
            </a>
            <!-- delete product -->
            <form action="{{ route('seller.delete-product', $product->slug) }}" method="POST">
                @csrf
                <button type="button" class="btn btn-danger" style="width: 100%" onclick="deleteConfirm()">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
        </div>
        <br>
    </div>
    @endforeach
</div>

@endsection

