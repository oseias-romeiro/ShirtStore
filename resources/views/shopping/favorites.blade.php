@extends('layouts.master')

@section('title', 'Favorits')


@section('content')
<br>
<h1>Favorites</h1>
<br>
<ul id="favorites_ul" class="list-group"></ul>
<h3 hidden="true" id="favorites_empty">
    Favorites is empty <i class="fa-solid fa-face-sad-tear"></i>
</h3>
<br>
<script type="module" src="/js/shopping/favorite.js"></script>
@endsection
