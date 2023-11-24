<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SellerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
       // verify if user is admin or seller
        $this->middleware('isSeller');
        
    }

    public function home() {
        $seller_id = auth()->user()->id;
        
        // admin user get all products
        if (auth()->user()->role == 'admin') {
            $products = Product::all();
        }else {
            $products = Product::where('seller_id', $seller_id)->get();
        }
        return view('seller.home', compact('products'));
    }

    public function addProduct() {
        $categories = Category::all();
        return view('seller.add_product', compact('categories'));
    }

    public function addProductPost(Request $request) {

        $request->validate([
            'images' => 'required',
            'slug' => 'required',
            'name' => 'required',
            'price' => 'required',
            'quantities' => 'required',
            'description' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'category' => 'required',
        ]);

        $data = $request->all();

        foreach ($data['images'] as $key => $image) {
            $imageName = time().$key.'.'.$image->extension();
            $image->move(public_path('images').'/products', $imageName);
            $images[] = $imageName;
        }
    
        Product::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'price' => $data['price'],
            'old_price' => $data['old_price'],
            'units' => $data['quantities'],
            'description' => $data['description'],
            'sizes' => json_encode(explode(',', $data['sizes'])),
            'colors' => json_encode(explode(',', $data['colors'])),
            'images' => json_encode($images),
            'seller_id' => auth()->user()->id,
            'category_id' => $data['category'],
        ]);

        return redirect()->route('seller.home', auth()->user()->id)->with('message', 'Product added successfully.');
    }

    public function editProduct($slug) {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $categories = Category::all();
            // transform json data in string of list with commas
            $product->sizes = implode(',', json_decode($product->sizes));
            $product->colors = implode(',', json_decode($product->colors));
            return view('seller.edit_product', ['product' => $product, 'categories' => $categories]);
        } else {
            abort(404);
        }
    }

    public function editProductPost(Request $request) {
        
        $data = $request->all();

        $product = Product::where('slug', $data['slug'])->first();

        if ($product) {
            // remove old images and add new ones
            if ($request->hasFile('images')) {
                foreach (json_decode($product->images) as $image) {
                    unlink(public_path('images').'/products/'.$image);
                }
                foreach ($data['images'] as $key => $image) {
                    $imageName = time().$key.'.'.$image->extension();
                    $image->move(public_path('images').'/products', $imageName);
                    $images[] = $imageName;
                }
                $product->images = json_encode($images);
            }
            $product->name = $data['name'];
            $product->slug = $data['slug'];
            $product->price = $data['price'];
            $product->old_price = $data['old_price'];
            $product->units = $data['quantities'];
            $product->description = $data['description'];
            $product->sizes = json_encode(explode(',', $data['sizes']));
            $product->colors = json_encode(explode(',', $data['colors']));
            $product->category_id = $data['category'];
            $product->save();
            return redirect()->route('seller.home', auth()->user()->id)->with('message', 'Product edited successfully.');
        } else {
            abort(404);
        }
    }

    public function deleteProduct($slug) {
        $product = Product::where('slug', $slug)->first();
        // check if seller is the owner of the product
        if ($product->seller_id != auth()->user()->id && auth()->user()->role != 'admin') {
            abort(403);
        }
        if ($product) {
            foreach (json_decode($product->images) as $image) {
                unlink(public_path('images').'/products/'.$image);
            }
            $product->delete();
            return redirect()->route('seller.home', auth()->user()->id)->with('message', 'Product deleted successfully.');
        } else {
            abort(404);
        }
    }
}
