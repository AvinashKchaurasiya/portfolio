<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Avinash Kumar - Website Developer';
        return view('index', $data);
    }
}
