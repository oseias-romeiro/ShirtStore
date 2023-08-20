<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SellerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isSeller');
    }

    public function home($seller_id) {
        $products = Product::where('seller_id', $seller_id)->get();
        return view('seller/home', compact('products'));
    }

}
