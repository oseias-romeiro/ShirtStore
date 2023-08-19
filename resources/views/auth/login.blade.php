@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="card-body">
    <h1 class="text-center pt-4">Login</h1>
    <hr>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nome">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="example@email.com" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="password2">Retype password</label>
            <input type="password" class="form-control" name="password2" required>
        </div>
        <div class="text-center pt-4">
            <button type="submit" class="btn btn-primary" style='min-width: 40%;'>Login</button>
        </div>
    </form>
</div>

@endsection
