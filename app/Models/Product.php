<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'price', 'old_price', 'units', 'description', 'sizes', 'colors', 'images', 'seller_id', 'category_id'];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
        'images' => 'array',
    ];

    public static $rules = [
        'name' => 'required',
        'slug' => 'required|unique:products',
        'price' => 'required|numeric|min:0',
        'old_price' => 'nullable|numeric|min:0',
        'units' => 'required|integer|min:0',
        'description' => 'required',
        'sizes' => 'required|array',
        'colors' => 'required|array',
        'images' => 'required|array',
        'seller_id' => 'required|exists:users,id',
        'category_id' => 'required|exists:categories,id',
    ];
}
