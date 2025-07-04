<?php

namespace App\Http\Controllers;

use App\Helpers\ExperienceHelper;
use App\Models\Admin\Client;
use App\Models\Admin\Education;
use App\Models\Admin\Experince;
use App\Models\Admin\Profile;
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

        // Get the personal information from the profile
        $personalInfo = Profile::first();

        //get the education information
        // Get the most recent education where currently_study is 'no', otherwise get the latest where currently_study is 'yes'
        // Get the education record with 'to_date' closest to today (but not in the future)
        $today = Carbon::today();

        $latestEducation = Education::whereDate('to_date', '<=', $today)
            ->orderByRaw('ABS(DATEDIFF(to_date, ?))', [$today])
            ->first();

        // If none found (all to_date in future), get the closest future one
        if (!$latestEducation) {
            $latestEducation = Education::orderByRaw('ABS(DATEDIFF(to_date, ?))', [$today])->first();
        }

        // Get all education records
        $educations = Education::orderBy('id', 'desc')->get();

        return view('index', compact('title', 'skills', 'services', 'experiences','experienceData', 'totalClients', 'personalInfo', 'educations', 'latestEducation'));
    }
}
