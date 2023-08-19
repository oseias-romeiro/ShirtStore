<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// TODO: add user role wirh seller, admin and customer
// TODO: add user relationship to product model
// TODO: add auth middleware role

class SellerController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function home() { return view('seller/home'); }

}
