@extends('layouts.master')

@section('title', 'Favorits')


@section('content')
<br>
<h1>Favorits</h1>
<hr>
<ul id="favorites_ul" class="list-group"></ul>
<h3 hidden="true" id="favorites_empty">Favorites is empty :(</h3>
<br>
<script type="module" src="/js/shopping/favorite.js"></script>
@endsection
