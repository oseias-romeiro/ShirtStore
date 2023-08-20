<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function bag() { return view('shopping.bag'); }
    public function favorites() { return view('shopping.favorites'); }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('shopping.product', ['product' => $product]);
        } else {
            abort(404);
        }
    }
}
