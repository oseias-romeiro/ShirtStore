<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index(Request $request) {
        // check authentication
        if(!Auth::check()) {
            return redirect(route('login'))->with('message', 'Please login to continue');
        }
        return view('auth.profile');
    }

    public function editProfile(Request $request) {
        // check authentication
        if(!Auth::check()) {
            return redirect(route('login'))->with('message', 'Please login to continue');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            //'role' => 'required|in:seller,customer,admin',
        ]);
        $data = $request->all();
        $user = User::find($data['id']);

        // check if passwords match
        if($data['password2'] != $data['password']) return redirect(route('register-user'))->with('message', 'Passwords do not matching');

        // update user
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        //$user->role = $data['role'];
        $user->save();

        return redirect(route('index'))->with('message', 'User account updated');
    }

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
            //'role' => 'required|in:seller,customer,admin',
        ]);
        $data = $request->all();

        // default role is customer if not specified
        if(!isset($data['role'])) $data['role'] = 'customer';

        // check if passwords match
        if($data['password2'] != $data['password']) return redirect(route('register-user'))->with('message', 'Passwords do not matching');

        $check = $this->userCreate($data);
        
        return redirect(route('login'))->with('message', 'User account created');
    }

    public function userCreate(array $data)
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
  
        return Redirect(route('index'))->with('message', 'You have signed-out');
    }

}
