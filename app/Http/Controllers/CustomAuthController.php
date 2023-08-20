<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function login() { return view('auth.login'); }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('index'))->with('message', 'Signed in');
        }

        return redirect(route('login'))->with('message', 'Invalid inputs');
    }

    public function registration() { return view('auth.registration'); }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:seller,customer,admin',
        ]);
        
        $data = $request->all();
        if($data['password2'] != $data['password']) return redirect(route('register-user'))->with('message', 'Passwords do not matching');

        $check = $this->create($data);
        
        return redirect(route('login'))->with('message', 'User account created');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect(route('index'))->with('message', 'You have signed-in');
    }

}
