<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    public function index()
    {
        $inquiries = ContactInquiry::latest()->paginate(20);
        return view('admin.contacts.index', compact('inquiries'));
    }

    public function show(ContactInquiry $contact)
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactInquiry $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Inquiry deleted successfully.');
    }
}
