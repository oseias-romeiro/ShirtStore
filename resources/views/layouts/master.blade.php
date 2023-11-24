<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @php
        $route = Route::getFacadeRoot()->current()->uri();
    @endphp
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family: 'Comic Sans MS', 'Comic Sans', cursive">
                <img src="/images/favicon.png" height="20">
                ShirtStore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('index')) ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ( request()->routeIs('favorites')) ? 'active' : '' }}" aria-current="page" href="{{ route('favorites') }}">
                        <i class="fa-solid fa-heart" style="color: #ffffff;"></i> Favorites
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('bag')) ? 'active' : '' }}" href="{{ route('bag') }}">
                        <i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i> Bag
                    </a>
                </li>
                @if ($route == '/')
                <li class="nav-item dropdown">
                    <a class="nav-link {{ ($route == 'categories') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars" style="color: #ffffff;"></i> Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li class="dropdown-item">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link {{ ($route == 'profile') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i> Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('account') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('signout') }}">SignOut</a></li>
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role == 'seller' or 
                    Auth::check() && Auth::user()->role == 'admin'                
                )
                <li class="nav-item">
                    <a class="nav-link {{ ($route == 'seller') ? 'active' : '' }}" href="{{ route('seller.home') }}">
                        <i class="fa-solid fa-store" style="color: #ffffff;"></i> Seller Sapce
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('login')) ? 'active' : '' }}" href="{{ route('login')}}">
                        <i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('register-user')) ? 'active' : '' }}" href="{{ route('register-user')}}">
                        <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i> Register
                    </a>
                </li>
                @endif
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    
    @if (session()->has('message'))
    <div class="alert alert-secondary alert-dismissible fade show text-center" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-dark text-center text-white fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2021 Copyright <a href="https://oseias-romeiro.github.io/">Oseias Romeiro</a>
        </div>
    </footer>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/js/app.js"></script>
</body>
</html>