@extends('layouts.master')

@section('title', 'Register')

@section('content')

<div class="card-body" style="max-width: 700px">
    <h1 class="text-center pt-4">Register</h1>
    <hr>
    <form action="{{ route('register-user') }}" method="post" autocomplete="off">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="example@email.com" name="email">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group mb-2">
            <label for="password2">Retype password</label>
            <input type="password" class="form-control" name="password2" required>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-primary" style='min-width: 40%;'>Register</button>
        </div>
    </form>
</div>

@endsection

