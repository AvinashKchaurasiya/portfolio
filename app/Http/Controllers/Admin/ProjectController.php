<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use App\Models\Admin\Service;
use App\Models\Admin\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function projectsIndex(){
        $title = "Projects";
        // Fetch projects from the database
        $projects = Project::with('service')->get();
        return view('admin.projects.project', compact('title', 'projects'));
    }

    // create project
    public function createProject(){
        $title = "Create Project";
        $services = Service::all();
        $technologies = Technology::all();
        return view('admin.projects.create-project', compact('title', 'services', 'technologies'));
    }

    // save project
    public function projectSave(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|image',
            'category' => 'required|exists:services,id',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'technologies' => 'required|array',
            'technologies.*' => 'string|exists:technologies,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', $validator->errors()->all()[0]);
        }

        $project = new Project();
        $project->project_name = $request->name;
        $project->service_id = $request->category;
        $project->description = $request->description;
        $project->url = $request->url;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $project->thumbnail = 'uploads/projects/' . $filename;
        }

        // Save technology names as comma-separated string in 'technology' column
        if ($request->has('technologies')) {
            $project->technology = implode(',', $request->technologies);
        }

        if($project->save()){
            return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to create project. Please try again.');
        }
    }

    // edit project
    public function editProject($id){
        $title = "Edit Project";
        $project = Project::findOrFail($id);
        $services = Service::all();
        $technologies = Technology::all();

        // Convert technology string to array
        $project->technologies = explode(',', $project->technology);

        return view('admin.projects.edit-project', compact('title', 'project', 'services', 'technologies'));
    }

    // update project
    public function updateProject(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image',
            'category' => 'required|exists:services,id',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'technologies' => 'required|array',
            'technologies.*' => 'string|exists:technologies,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0]);
        }

        $project = Project::findOrFail($id);
        $project->project_name = $request->name;
        $project->service_id = $request->category;
        $project->description = $request->description;
        $project->url = $request->url;

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($project->thumbnail && file_exists(public_path($project->thumbnail))) {
                unlink(public_path($project->thumbnail));
            }
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $project->thumbnail = 'uploads/projects/' . $filename;
        }

        // Save technology names as comma-separated string in 'technology' column
        if ($request->has('technologies')) {
            $project->technology = implode(',', $request->technologies);
        }

        if($project->save()){
            return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to update project. Please try again.');
        }
    }

    // delete project
    public function deleteProject($id){
        $project = Project::findOrFail($id);

        // Delete the project thumbnail if it exists
        if ($project->thumbnail && file_exists(public_path($project->thumbnail))) {
            unlink(public_path($project->thumbnail));
        }

        if($project->delete()){
            return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to delete project. Please try again.');
        }
    }
}
