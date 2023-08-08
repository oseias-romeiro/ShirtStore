@extends('layouts.master')

@section('title', 'Hello')


@section('content')

<div class="text-center text-light" style="background-color: rgba(0, 0, 0, 0.26); height: 100vh;">
    <br>
    <h1>ShirtStore</h1>
    
</div>

<style>
    body {
        background-image: url("{{ asset('images/back.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

@endsection
