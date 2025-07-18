<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactMail;
use App\Mail\UserConfirmationMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactFormSave(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'subject', 'message']);

        try {
            // ✅ 1. Save to database
            Contact::create($data);

            // ✅ 2. Send email to you (admin)
            Mail::to('avinash8564kumar@gmail.com')->send(new AdminContactMail($data));

            // ✅ 3. Send confirmation email to user
            Mail::to($data['email'])->send(new UserConfirmationMail($data));

            // ✅ 4. Redirect to thank-you
            return redirect()->route('thankYou');

        } catch (\Exception $e) {
            // ✅ Log error (optional)
            Log::error('Contact form error: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function thankYou(){
        $data['title'] = 'Thank You';
        return view('thankyou');
    }
}
