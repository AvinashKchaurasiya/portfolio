<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Index()
    {
        $title = "Contact Form Details";
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact-from-details.contact', compact('title', 'contacts'));
    }
}
