<?php

namespace App\Http\Controllers;

use App\Models\Admin\Experince;
use App\Models\Admin\Service;
use App\Models\Admin\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Avinash Kumar - Website Developer';
        $skills = Skill::all();
        $services = Service::where('is_active', 1)->get();
        $experiences = Experince::orderBy('id', 'desc')->get();
        return view('index', compact('title', 'skills', 'services', 'experiences'));
    }
}
