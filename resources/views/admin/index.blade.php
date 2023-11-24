
@extends('layouts.admin')

@section('title', 'ShirtStore|Admin')

@section('content')
    <div class="container pt-4">
        <h1>Welcome to the Admin Section</h1>
        <p>This is the index page for the admin section of the Shirt Store.</p>
        <!-- Add your admin-specific content here -->
        <div class="row">
            <div class="col">
                <div class="card">
                    User Manager
                </div>
            </div>
            <div class="col">
                <div class="card">
                    Product Manager
                </div>
            </div>
            <div class="col">
                <div class="card">
                    Order Manager
                </div>
            </div>
        </div>
    </div>
@endsection
