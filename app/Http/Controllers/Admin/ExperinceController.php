<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Experince;
use Illuminate\Support\Facades\Validator;

class ExperinceController extends Controller
{
    public function Index()
    {
        $title = "Experiences";
        $experiences = Experince::all();
        return view('admin.experince.experince', compact('experiences', 'title'));
    }

    // create experience
    public function createExperience(){
        $title = "Create Experience";
        return view('admin.experince.add-experence', compact('title'));
    }

    // save experience
    public function experienceSave(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'currently_working' => 'boolean',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $experience = new Experince();
        $experience->title = $request->title;
        $experience->company = $request->company;
        $experience->location = $request->location;
        $experience->from_date = $request->from_date;
        $experience->to_date = $request->currently_working ? null : $request->to_date;
        $experience->currently_working = $request->currently_working ? $request->currently_working : 0;
        $experience->description = $request->description;
        if($experience->save()){
            return redirect()->route('admin.experiences')->with('success', 'Experience added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add experience. Please try again.');
        }
    }

    //edit experience
    public function editExperience($id){
        $title = "Edit Experience";
        $experience = Experince::findOrFail($id);
        return view('admin.experince.edit-experience', compact('experience', 'title'));
    }

    // update experience
    public function updateExperience(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'currently_working' => 'boolean',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $experience = Experince::findOrFail($id);
        $experience->title = $request->title;
        $experience->company = $request->company;
        $experience->location = $request->location;
        $experience->from_date = $request->from_date;
        $experience->to_date = $request->currently_working ? null : $request->to_date;
        $experience->currently_working = $request->currently_working ? $request->currently_working : 0;
        $experience->description = $request->description;

        if($experience->save()){
            return redirect()->route('admin.experiences')->with('success', 'Experience updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update experience. Please try again.');
        }
    }

    // delete experience
    public function deleteExperience($id){
        $experience = Experince::findOrFail($id);
        if($experience->delete()){
            return redirect()->route('admin.experiences')->with('success', 'Experience deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete experience. Please try again.');
        }
    }
}
