@extends('layouts.master')

@section('title', 'Register')

@section('content')

<div class="card-body" style="max-width: 700px">
    <h1 class="text-center pt-4">Profile</h1>
    <hr>
    <form action="{{ route('edit-profile') }}" method="post" autocomplete="off">
        @csrf
        <input type="number" name="id" value="{{ auth()->user()->id }}" hidden>
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
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
            <button type="submit" class="btn btn-primary" style='min-width: 40%;'>Edit</button>
        </div>
    </form>
</div>

@endsection

