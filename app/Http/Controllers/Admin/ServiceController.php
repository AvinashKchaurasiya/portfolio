<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function Index(){
        // Fetch all services from the database
        $title = "Service List";
        $services = Service::all();
        return view('admin.service.service', compact('services', 'title'));
    }

    // save service with icon
    public function serviceSave(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $service = new Service();
        $service->title = $request->name;
        $service->description = $request->description;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $service->icon = 'uploads/services/' . $filename;
        }

        $service->is_active = 1;

        if($service->save()){
            return redirect()->back()->with('success', 'Service added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add service. Please try again.');
        }
    }
    
    // delete service with icon
    public function deleteService($id){
        $service = Service::find($id);
        if ($service) {
            if (file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
            if($service->delete()){
                return redirect()->back()->with('success', 'Service deleted successfully!');
            }else{
                return redirect()->back()->with('error', 'Failed to delete service. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Service not found.');
        }
    }

    // update sevice status
    public function updateStatus(Request $request, $id){
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $service->is_active = $request->status ? 1 : 0;
        // dd($service->is_active);
        if ($service->save()) {
            return redirect()->back()->with('success', 'Service status updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update service status. Please try again.');
        }
    }

    // edit service
    public function editService($id){
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        $title = "Edit Service";
        return view('admin.service.edit-service', compact('service', 'title'));
    }

    // update service with icon if exist
    public function updateService(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0]);
        }

        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $service->title = $request->name;
        $service->description = $request->description;

        if ($request->hasFile('icon')) {
            if (file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $service->icon = 'uploads/services/' . $filename;
        }

        if ($service->save()) {
            return redirect()->route('admin.services')->with('success', 'Service updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update service. Please try again.');
        }
    }
}
