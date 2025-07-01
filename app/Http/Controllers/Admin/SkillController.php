<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function Index(){
        $title = "Skills";
        $skills = Skill::all();
        return view('admin.skill.skill', compact('title', 'skills'));
    }

    // store skill with icon
    public function skillSave(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|image',
        ]);

        // Step 2: Check Validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $skill = new Skill();
        $skill->name = $request->name;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/skills'), $filename);
            $skill->icon = 'uploads/skills/' . $filename;
        }

        if($skill->save()){
            return redirect()->back()->with('success', 'Skill added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add skill. Please try again.');
        }
    }

    // delete skill with icon
    public function deleteSkill($id){
        $skill = Skill::find($id);
        if ($skill) {
            if (file_exists(public_path($skill->icon))) {
                unlink(public_path($skill->icon));
            }
            if($skill->delete()){
                return redirect()->back()->with('success', 'Skill deleted successfully!');
            }else{
                return redirect()->back()->with('error', 'Failed to delete skill. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Skill not found.');
        }
    }

    // edit skill
    public function editSkill($id){
        $title = "Edit Skill";
        $skill = Skill::find($id);
        if (!$skill) {
            return redirect()->back()->with('error', 'Skill not found.');
        }
        return view('admin.skill.edit-skill', compact('title', 'skill'));
    }

    // update skill with image if provided
    public function updateSkill(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $skill = Skill::find($id);
        if (!$skill) {
            return redirect()->back()->with('error', 'Skill not found.');
        }

        $skill->name = $request->name;

        if ($request->hasFile('icon')) {
            if (file_exists(public_path($skill->icon))) {
                unlink(public_path($skill->icon));
            }
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/skills'), $filename);
            $skill->icon = 'uploads/skills/' . $filename;
        }

        if($skill->save()){
            return redirect()->route('admin.skills')->with('success', 'Skill updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update skill. Please try again.');
        }
    }
}
