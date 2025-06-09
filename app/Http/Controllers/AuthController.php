<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data['title'] = "Admin Login";
        return view("login.login", $data);
    }
}
