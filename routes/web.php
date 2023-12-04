<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;

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

$PREFIX = '/';

$routes = function(){
    /* Customer routes */
    Route::get('/', [Controller::class, 'index'])->name('index');
    # TODO: melhorar interface da bag
    Route::get('/shopping/bag', [Controller::class, 'bag'])->name('bag');
    # TODO: melhorar interface dos favoritos
    Route::get('/shopping/favorites', [Controller::class, 'favorites'])->name('favorites');
    Route::get('/shopping/product/{slug}', [Controller::class, 'product'])->name('product');

    /* Seller routes */
    Route::get('/seller', [SellerController::class, 'home'])->name('seller.home');
    // TODO: melhorar interface para os campos de tamanho e cor
    Route::get('/product/add', [SellerController::class, 'addProduct'])->name('seller.add-product');
    Route::post('/product/add', [SellerController::class, 'addProductPost'])->name('seller.add-product');
    Route::get('/product/edit/{slug}', [SellerController::class, 'editProduct'])->name('seller.edit-product');
    Route::post('/product/edit-post', [SellerController::class, 'editProductPost'])->name('seller.edit-product-post');
    Route::post('/product/delete/{slug}', [SellerController::class, 'deleteProduct'])->name('seller.delete-product');

    /* Admin routes */
    Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/role/edit', [AdminController::class, 'editRole'])->name('admin.role.edit');

    /* Auth routes */
    Route::get('/account', [CustomAuthController::class, 'index'])->name('account');
    Route::post('/account/edit', [CustomAuthController::class, 'editProfile'])->name('edit-profile');
    Route::get('/account/login', [CustomAuthController::class, 'login'])->name('login');
    Route::post('/account/login', [CustomAuthController::class, 'customLogin'])->name('login');
    Route::get('/account/registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('/account/registration', [CustomAuthController::class, 'customRegistration'])->name('register-user');
    Route::get('/account/signout', [CustomAuthController::class, 'signOut'])->name('signout');
};

Route::prefix($PREFIX)->group($routes);

