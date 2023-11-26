<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isAdmin'); // verify if user is admin
    }

    public function home() { return view('admin.index'); }
    
    public function users() {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function editRole(Request $request) {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.users');
    }

}
