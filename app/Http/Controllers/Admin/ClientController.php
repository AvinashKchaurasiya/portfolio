<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function Index(){
        $title = "Clients";
        $clients = Client::all();
        return view('admin.clients.client', compact('title', 'clients'));
    }

    // save client
    public function clientSave(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'company_name' => 'string|max:255',
            'email' => 'email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pincode' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', $validator->errors()->all()[0] );;
        }

        $client = new Client();
        $client->name = $request->name;
        $client->company_name = $request->company_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->country = $request->country;
        $client->postal_code = $request->pincode;

        if($client->save()){
            return redirect()->route('admin.clients')->with('success', 'Client added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add client. Please try again.');
        }
    }

    // edit client
    public function editClient($id){
        $title = "Edit Client";
        $client = Client::find($id);
        if(!$client){
            return redirect()->route('admin.clients')->with('error', 'Client not found.');
        }
        return view('admin.clients.edit-client', compact('title', 'client'));
    }

    // update client
    public function updateClient(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'company_name' => 'string|max:255',
            'email' => 'email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pincode' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->all()[0] );
        }

        $client = Client::find($id);
        if(!$client){
            return redirect()->route('admin.clients')->with('error', 'Client not found.');
        }

        $client->name = $request->name;
        $client->company_name = $request->company_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->country = $request->country;
        $client->postal_code = $request->pincode;

        if($client->save()){
            return redirect()->route('admin.clients')->with('success', 'Client updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update client. Please try again.');
        }
    }

    // delete client
    public function deleteClient($id){
        $client = Client::find($id);
        if(!$client){
            return redirect()->route('admin.clients')->with('error', 'Client not found.');
        }

        if($client->delete()){
            return redirect()->route('admin.clients')->with('success', 'Client deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete client. Please try again.');
        }
    }
}
