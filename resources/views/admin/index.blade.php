@extends('layouts.master')

@section('title', 'ShirtStore|Admin')

@section('content')
    <div class="container pt-4 pb-4">
        <h1>Welcome to the Admin Section</h1>
        <p>This is the index page for the admin section of the Shirt Store.</p>

        <div class="row text-center pt-4">
            <a style="text-decoration: none;" href="{{ route('admin.users') }}" class="col-lg-4 col-12 pb-4">
                <div class="card d-flex flex-column justify-content-center custom-card-color-1" style="min-height: 300px; background-color: #ffeeba;">
                    <span class="font-weight-bold text-dark h4">User Manager</span>
                </div>
            </a>
            <a style="text-decoration: none;" href="{{ route('seller.home') }}" class="col-lg-4 col-12 pb-4">
                <div class="card d-flex flex-column justify-content-center custom-card-color-2" style="min-height: 300px; background-color: #c3e6cb;">
                    <span class="font-weight-bold text-dark h4">Product Manager</span>
                </div>
            </a>
            <a style="text-decoration: none;" href="" class="col-lg-4 col-12 pb-4">
                <div class="card d-flex flex-column justify-content-center custom-card-color-3" style="min-height: 300px; background-color: #d4a3cb;">
                   <span class="font-weight-bold text-dark h4">Order Manager</span>
                </div>
            </a>
        </div>
    </div>
    <br>
@endsection
