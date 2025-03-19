<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

    public function loginView(){
        return view('auth.login');
    }
    
    public function registerUser(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash password before saving
        ]);

        if($user){
            return redirect(route(name: 'auth.login'))->with('success', 'Registration Successful');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route(name:'std.index'))->with('success', 'Logged in successfully!');
        }
        return redirect(route(name: 'auth.login'))->with('fail', 'Logged in Failed miserably!');
    }

}