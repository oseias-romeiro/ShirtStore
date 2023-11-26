<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $categories = Category::all();
        $category = $request->query('category');
        $search = $request->query('search');

        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('category_id', $category);
        })
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->get();

        return view('index', compact('products', 'categories'));
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
