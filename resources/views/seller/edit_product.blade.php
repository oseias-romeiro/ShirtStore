@extends('layouts.master')

@section('title', 'Edit product')


@section('content')

<div class="container">
    <h1 class="p-4">Edit product</h1>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-sm-12 col-md-6">
            <br>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    @foreach (json_decode($product->images, true) as $i)
                    <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                        <img src='/images/products/{{ $i }}' alt='{{ $product->name }}' class="d-block w-100" style="max-height: 700px;" >
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
        <div class="col-sm-12 col-md-6">
            <form action="{{ route('seller.edit-product-post') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <input type="hidden" name="seller_id" value="{{ Auth::user()->id }}">
                <div class="form-group pb-3">
                    <label for="formFileMultiple" class="form-label">Images</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="imagem[]" multiple >
                    <small>3:4 images on portrait mode</small>
                </div>
                <div class="form-group pb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ $product->slug }}">
                </div>
                <div class="form-group pb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  value="{{ $product->name }}">
                </div>
                <div class="form-group pb-3">
                    <label for="quantities">Quantities</label>
                    <input type="number" step='1' class="form-control" id="quantities" name="quantities" value="{{ $product->units }}">
                </div>
                <div class="form-group pb-3">
                    <label for="price">Price</label>
                    <input type="number" step='0.01' class="form-control" id="price" name="price"  value="{{ $product->price }}">
                </div>
                <div class="form-group pb-3">
                    <label for="old_price">Old price</label>
                    <input type="number" step='0.01' class="form-control" id="old_price" name="old_price" value="{{ $product->old_price }}">
                </div>
                <div class="form-group pb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description" >{{ $product->description }}</textarea>
                </div>
                <div class="form-group pb-3">
                    <label for="sizes">Avaliable sizes</label>
                    <input type="text" class="form-control" id="sizes" name="sizes"  value="{{ $product->sizes }}">
                </div>
                <div class="form-group pb-3">
                    <label for="colors">Avaliable colors</label>
                    <input type="text" class="form-control" id="colors" name="colors"  value="{{ $product->colors }}">
                </div>
        
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 100px;">
                    <i class="fa fa-plus"></i> Edit
                </button>
            </form>
        </div>
    </div>
   
</div>

@endsection