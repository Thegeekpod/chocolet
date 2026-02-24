<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:20',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string',
        ]);

        ContactInquiry::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,
        ]);

        return back()->with('contact_success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
