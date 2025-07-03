<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ExperienceHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use App\Models\Admin\Experince;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard | Admin Panel";
        // $experiences = Experince::orderBy('id', 'desc')->get();
        // Calculate the total experience in years and months
        $experienceData = ExperienceHelper::calculateExperience();
        
        // Get the total number of clients
        $totalClients = Client::all()->count();

        return view('admin.pages.dashboard', compact('title', 'experienceData', 'totalClients'));
    }
}
