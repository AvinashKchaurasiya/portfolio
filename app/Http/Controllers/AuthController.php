<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data['title'] = "Admin Login";
        return view("login.login", $data);
    }

    // login process
    public function loginProcess(Request $request){
        // Input validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'email.email' => 'Please enter a valid email address',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
              session()->put([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Admin login successful!');
        }

        // Login failed
        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget(['user_id', 'user_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin.login')->with('success', 'Logged out successfully!');
    }
}
