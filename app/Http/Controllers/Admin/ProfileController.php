<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileDetails(){
        $title = 'Profile Details';
        $profile = Profile::first();
        return view('admin.profiles.profile-details', compact('profile', 'title'));
    }
}
