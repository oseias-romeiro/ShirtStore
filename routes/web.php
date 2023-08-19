<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CustomAuthController;

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

/* Seller routes */

// TODO: add user role wirh seller, admin and customer
// TODO: add user relationship to product model
// TODO: add auth middleware role
Route::get('/seller', function () {
    return view('seller/home');
})  -> middleware('auth');

/* Auth routes */
Route::get('/account/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/account/login', [CustomAuthController::class, 'customLogin'])->name('login');
Route::get('/account/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/account/registration', [CustomAuthController::class, 'customRegistration'])->name('register-user');
Route::get('/account/signout', [CustomAuthController::class, 'signOut'])->name('signout');
