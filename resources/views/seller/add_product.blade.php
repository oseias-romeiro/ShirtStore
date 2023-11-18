
@extends('layouts.master')

@section('title', 'Add product')


@section('content')

<div class="container">
    <br><br>
    <h1>New product</h1>
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
            <input type="text" class="form-control" id="slug" name="slug" required>
            <small>Must not contain spaces</small>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step='0.01' class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="old_price">Old price</label>
            <input type="number" step='0.01' class="form-control" id="old_price" name="old_price">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="sizes">Avaliable sizes</label>
            <input type="text" class="form-control" id="sizes" name="sizes" required>
        </div>
        <div class="form-group">
            <label for="colors">Avaliable colors</label>
            <input type="text" class="form-control" id="colors" name="colors" required>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

@endsection
