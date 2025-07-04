<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function educationIndex(){
        $title = 'Education List';
        $educations = Education::all();
        return view('admin.educations.education', compact('title', 'educations'));
    }

    // create education
    public function createEducation(){
        $title = 'Create Education';
        return view('admin.educations.create-education', compact('title'));
    }

    // save education
    public function educationSave(Request $request){
        $validator = Validator::make($request->all(), [
            'course' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'college_name' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'currently_study' => 'nullable|boolean',
            'description' => 'nullable|string',
            'mini_project_description' => 'nullable|string',
            'major_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed. Please check your input.');
        }

        $educations = new Education();
        $educations->cource = $request->course;
        $educations->specialization = $request->specialization;
        $educations->collage_name = $request->college_name;
        $educations->from_date = $request->from_date;
        $educations->to_date = $request->currently_study ? null : $request->to_date;
        $educations->currently_study = $request->currently_study ? 1 : 0;
        $educations->description = $request->description;
        $educations->mini_project = $request->mini_project_description;
        $educations->major_project = $request->major_description;
        
        if($educations->save()){
            return redirect()->route('admin.educations')->with('success', 'Education created successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to create education. Please try again.');
        }
    }

    // edit education
    public function editEducation($id){
        $title = 'Edit Education';
        $education = Education::findOrFail($id);
        return view('admin.educations.edit-education', compact('title', 'education'));  
    }

    // update education
    public function updateEducation(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'course' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'college_name' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'currently_study' => 'nullable|boolean',
            'description' => 'nullable|string',
            'mini_project_description' => 'nullable|string',
            'major_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed. Please check your input.');
        }

        $education = Education::findOrFail($id);
        $education->cource = $request->course;
        $education->specialization = $request->specialization;
        $education->collage_name = $request->college_name;
        $education->from_date = $request->from_date;
        $education->to_date = $request->currently_study ? null : $request->to_date;
        $education->currently_study = $request->currently_study ? 1 : 0;
        $education->description = $request->description;
        $education->mini_project = $request->mini_project_description;
        $education->major_project = $request->major_description;

        if($education->save()){
            return redirect()->route('admin.educations')->with('success', 'Education updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to update education. Please try again.');
        }
    }
}
