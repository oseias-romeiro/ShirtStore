@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="card-body" style="max-width: 700px;">
    <h1 class="text-center pt-4">Login</h1>
    <hr>
    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="example@email.com" name="email">
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" style='min-width: 40%;'>Login</button>
        </div>
    </form>
</div>

@endsection

