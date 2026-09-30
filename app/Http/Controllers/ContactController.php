<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Honeypot check - if filled by automated bots, silently discard
        if ($request->filled('company_check_field')) {
            return back()->with('contact_success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
        }

        $request->validate([
            'full_name' => 'required|string|max:100',
            'email'     => 'required|email:rfc,dns|max:150',
            'phone'     => 'nullable|string|max:20',
            'subject'   => 'nullable|string|max:200',
            'message'   => 'required|string|max:3000',
        ]);

        ContactInquiry::create([
            'full_name' => strip_tags($request->full_name),
            'email'     => strip_tags($request->email),
            'phone'     => strip_tags($request->phone ?? ''),
            'subject'   => strip_tags($request->subject ?? ''),
            'message'   => strip_tags($request->message),
        ]);

        return back()->with('contact_success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
