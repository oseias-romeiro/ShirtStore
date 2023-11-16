@extends('layouts.master')

@section('title', $product->name)


@section('content')

<br>
<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-6">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    @foreach (json_decode($product->images, true) as $i)
                    <div class="carousel-item active">
                        <img src='/images/products/{{ $i }}' alt='{{ $product->name }}' class="d-block w-100" >
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class='card text-center'><div class="card-body">
                <h2 class='card-title'>{{ $product->name }}</h2>
                <hr>
                <p class="card-text">{{ $product->description }}</p>

                <label>Quantities</label>
                <input style="max-width: 80px;" type="number" value="{{ $product->units }}" disabled><br>

                <del>{{ $product->old_price }}</del>
                <h2 class="text-primary">{{ $product->price }}</h2>
                
                <form action="" method="">
                <div class="row">
                    <div class="col">
                        <label for="units">Units</label>
                        <input id="units" class="form-control" type="number" name="units" id="units">
                    </div>
                    <div class="col">
                        <label for="size">Sizes</label>
                        <select id="size" class="form-control" name="size" id="size">
                            @foreach (json_decode($product->sizes, true) as $s)
                            <option value="{{ $s }}">{{ $s }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="color">Colors</label>
                        <select id="color" class="form-control" name="color" id="size">
                            @foreach (json_decode($product->colors, true) as $c)
                            <option selected value="{{ $c }}">{{ $c }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <button id="favorites-btn" data-info='{"name": "{{ $product->name }}", "slug": "{{ $product->slug }}", "img": "{{ json_decode($product->images, true)[0] }}"}' type="button" class="favoriting btn">
                    <i class="fa-solid fa-heart" style="color: #000;"></i>
                </button>
                <button id="baggin-btn" type="button" data-info='{"name": "{{ $product->name }}", "slug": "{{ $product->slug }}", "img": "{{ json_decode($product->images, true)[0] }}", "price": "{{ $product->price }}"}' class="btn">
                    <i class="fa-solid fa-bag-shopping" style="color: #000;"></i>
                </button>
                <button type="submit" class="btn btn-primary">Buy</button>
                </form>
            </div></div>
        </div>
    </div>
</div>

<script type="module" src="/js/shopping/bag.js"></script>
<script type="module" src="/js/shopping/favorite.js"></script>
@endsection
