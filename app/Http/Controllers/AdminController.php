<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isAdmin'); // verify if user is admin
    }

    public function home() { return view('admin.index'); }
    
}
