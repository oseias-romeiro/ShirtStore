@extends('layouts.master')

@section('title', 'Bag')


@section('content')
<br>
<h1>Bag</h1>
<br>
<ul id="bag_ul" class="list-group"></ul>
<h3 hidden="true" id="bag_empty">
    Bag is empty <i class="fa-solid fa-face-sad-tear" ></i>
</h3>
<br>
<script type="module" src="/js/shopping/bag.js"></script>

@endsection
