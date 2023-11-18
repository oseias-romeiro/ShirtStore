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
        return view('seller.home', compact('products'));
    }

    public function addProduct() { return view('seller.add_product'); }

    public function editProduct($slug) {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('seller.edit_product', ['product' => $product]);
        } else {
            abort(404);
        }
    }

    public function addProductPost() {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'units' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();
        $check = $this->storeProduct($data);

        return redirect()->route('seller.home', auth()->user()->id)->with('message', 'Product added successfully.');
    }

    public function storeProduct(array $data) {

        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        return Product::create([
            'seller_id' => auth()->user()->id,
            'name' => $data['name'],
            'price' => $data['price'],
            'old_price' => $data['old_price'],
            'units' => $data['units'],
            'colors' => $data['colors'],
            'description' => $data['description'],
            'images' => $data['images'],
        ]);
    }
}
