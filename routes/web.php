<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SellerController;

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

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/shopping/bag', [Controller::class, 'bag'])->name('bag');
Route::get('/shopping/favorites', [Controller::class, 'favorites'])->name('favorites');
Route::get('/shopping/product/{slug}', [Controller::class, 'product'])->name('product');

/* Seller routes */

Route::get('/seller', [SellerController::class, 'home'])->name('seller.home');


/* Auth routes */
Route::get('/account/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/account/login', [CustomAuthController::class, 'customLogin'])->name('login');
Route::get('/account/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/account/registration', [CustomAuthController::class, 'customRegistration'])->name('register-user');
Route::get('/account/signout', [CustomAuthController::class, 'signOut'])->name('signout');
