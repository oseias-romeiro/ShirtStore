
@extends('layouts.master')

@section('title', 'Home')


@section('content')

<br>
<div class="row">
    <div class="col-8">
        <h2>LIST</h2>
    </div>
    <div class="col-4">
        <a href="./adicionar">
            <button class="btn btn-success">+ NEW</button>
        </a>
    </div>
</div>
<hr>
<div class="row">
    @foreach ($products as $product)
    <div class='col'>
        <a href='./edit{{ product->slug }}' style='text-decoration: none; color: black'>
            <div class='card-body' style='text-align: center'>
                <h5 class='card-title'>{{ product->slug }}</h5>
                <del>{{ product->old_price }}</del>
                <h2>{{ product->price }}</h2>
            </div>
        </a>
        <br>
    </div>
    @endforeach
</div>

@endsection

