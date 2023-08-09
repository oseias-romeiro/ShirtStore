<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
});

// TODO: bag with cookies
Route::get('/shopping/bag', function () {
    return view('shopping/bag');
});

// TODO: need auth
Route::get('/shopping/favorites', function () {
    return view('shopping/favorites');
});

Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->first();
    if ($product) {
        return view('shopping/product', ['product' => $product]);
    } else {
        abort(404); // product not found
    }
});
