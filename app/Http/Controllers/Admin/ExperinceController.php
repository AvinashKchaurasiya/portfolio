<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Experince;

class ExperinceController extends Controller
{
    public function Index()
    {
        $title = "Experiences";
        $experiences = Experince::all();
        return view('admin.experince.experince', compact('experiences', 'title'));
    }
}
