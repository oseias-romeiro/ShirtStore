@extends('layouts.master')

@section('title', 'Edit product')


@section('content')

<div class="container">
    <h1 class="p-4">Edit product</h1>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="seller_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="formFileMultiple" class="form-label">Images</label>
            <input class="form-control" type="file" id="formFileMultiple" name="imagem[]" multiple required>
            <small>3:4 images on portrait mode</small>
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" disabled value="{{ $product->slug }}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step='0.01' class="form-control" id="price" name="price" required value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="old_price">Old price</label>
            <input type="number" step='0.01' class="form-control" id="old_price" name="old_price" value="{{ $product->old_price }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" required>
                {{ $product->description }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="sizes">Avaliable sizes</label>
            <input type="text" class="form-control" id="sizes" name="sizes" required value="{{ $product->sizes }}">
        </div>
        <div class="form-group">
            <label for="colors">Avaliable colors</label>
            <input type="text" class="form-control" id="colors" name="colors" required value="{{ $product->color }}">
        </div>

        <button type="submit" class="btn btn-primary mt-4" style="width: 100%">
            <i class="fa fa-plus"></i> Edit
        </button>
    </form>
</div>

@endsection