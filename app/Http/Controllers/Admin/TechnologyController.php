<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    public function index()
    {
        // Fetch all technologies from the database
        $title = "Technology List";
        $technologies = Technology::all();
        return view('admin.technology.technology', compact('technologies','title'));
    }

    // save technology
    public function technologySave(Request $request){
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|image',
        ]);

        // Step 2: Check Validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        // Step 3: Save Technology
        $technology = new Technology();
        $technology->name = $request->name;
        $technology->description = $request->description;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/technologies'), $filename);
            $technology->icon = 'uploads/technologies/' . $filename;
        }

        if($technology->save()){
            return redirect()->back()->with('success', 'Technology added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add technology. Please try again.');
        }

    }

    // delete technology
    public function deleteTechnology($id){
        $technology = Technology::find($id);

        if (!$technology) {
            return redirect()->back()->with('error', 'Technology not found.');
        }

        if ($technology->icon && file_exists(public_path($technology->icon))) {
            unlink(public_path($technology->icon));
        }

        if ($technology->delete()) {
            return redirect()->back()->with('success', 'Technology deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete technology. Please try again.');
        }
    }

    // edit technology
    public function editTechnology($id){
        $technology = Technology::find($id);

        if (!$technology) {
            return redirect()->back()->with('error', 'Technology not found.');
        }

        $title = "Edit Technology";
        return view('admin.technology.edit-technology', compact('technology', 'title'));
    }

    // update technology
    public function updateTechnology(Request $request, $id){
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
        ]);

        // Step 2: Check Validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        // Step 3: Update Technology
        $technology = Technology::find($id);
        if (!$technology) {
            return redirect()->back()->with('error', 'Technology not found.');
        }

        $technology->name = $request->name;
        $technology->description = $request->description;

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($technology->icon && file_exists(public_path($technology->icon))) {
                unlink(public_path($technology->icon));
            }

            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/technologies'), $filename);
            $technology->icon = 'uploads/technologies/' . $filename;
        }

        if($technology->save()){
            return redirect()->route('admin.technology')->with('success', 'Technology updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update technology. Please try again.');
        }
    }
}
