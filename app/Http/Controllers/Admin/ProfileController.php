<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profileDetails(){
        $title = 'Profile Details';
        $profile = Profile::first();
        return view('admin.profiles.profile-details', compact('profile', 'title'));
    }

    // save profile image
    public function saveProfileImage(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Invalid profile image.');
        }

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/images/profile'), $imageName);
            $profile->image = 'admin/images/profile/' . $imageName;
        }

        if($profile->save()){
            return redirect()->route('admin.profileDetails')->with('success', 'Profile image updated successfully.');
        }else {
            return redirect()->back()->with('error', 'Failed to update profile image.');
        }
    }

    // save profile details
    public function saveProfileDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Invalid input for profile details.');
        }

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->mobile = $request->input('phone');
        $profile->location = $request->input('location');
        $profile->bio = $request->input('bio');

        if($profile->save()){
            return redirect()->route('admin.profileDetails')->with('success', 'Profile details updated successfully.');
        }else {
            return redirect()->back()->with('error', 'Failed to update profile details.');
        }
    }

    // save profile social links
    public function saveProfileSocialLinks(Request $request){
        $validator = Validator::make($request->all(), [
            'linkedin_url' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Invalid input for social links.');
        }

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        $profile->linkedin_url = $request->input('linkedin_url');
        $profile->website = $request->input('website');

        if($profile->save()){
            return redirect()->route('admin.profileDetails')->with('success', 'Social links updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update social links.');
        }
    }

    // save profile resume
    public function saveProfileResume(Request $request){
        $validator = Validator::make($request->all(), [
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Invalid resume file.');
        }

        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/resumes'), $fileName);
            $profile->resume = 'admin/resumes/' . $fileName;
        }

        if($profile->save()){
            return redirect()->route('admin.profileDetails')->with('success', 'Resume updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update resume.');
        }
    }
}
