<?php

namespace App\Http\Controllers;

use App\Helpers\ExperienceHelper;
use App\Models\Admin\Client;
use App\Models\Admin\Experince;
use App\Models\Admin\Service;
use App\Models\Admin\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Avinash Kumar - Website Developer';

        // Get all skills
        $skills = Skill::all();

        // Get all active services
        $services = Service::where('is_active', 1)->get();
        
        // Get all experiences
        $experiences = Experince::orderBy('id', 'desc')->get();
        // Calculate the total experience in years and months
        $experienceData = ExperienceHelper::calculateExperience();
        
        // Get the total number of clients
        $totalClients = Client::all()->count();

        return view('index', compact('title', 'skills', 'services', 'experiences','experienceData', 'totalClients'));
    }
}
