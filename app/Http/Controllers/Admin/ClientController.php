<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Index(){
        $title = "Clients";
        $clients = Client::all();
        return view('admin.clients.client', compact('title', 'clients'));
    }
}
