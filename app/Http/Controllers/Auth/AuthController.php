<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Correct namespace

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function index()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }
    
    /**
     * Register a new user
     */
    public function registerUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash password correctly
        ]);

        if ($user) {
            return redirect(route('auth.login'))->with('success', 'Registration Successful');
        }
        return back()->with('fail', 'Registration failed');
    }

    /**
     * Login user
     */
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('std.index'))->with('success', 'Logged in successfully!');
        }

        return redirect(route('auth.login'))->with('fail', 'Login failed!');
    }

    /**
     * Logout user
     */
    public function logoutUser(Request $request)
    {
        Auth::logout(); // Logout the user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Prevent CSRF attacks

        return redirect(route('auth.login'))->with('success', 'Logged out successfully!');
    }
}
