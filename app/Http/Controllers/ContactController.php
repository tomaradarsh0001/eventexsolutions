<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }
    
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Return JSON for AJAX requests (used in modal)
        if (request()->ajax()) {
            return response()->json($contact);
        }
        
        // If not AJAX, redirect to index (or you can return 404)
        return redirect()->route('admin.contacts.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting us! We will get back to you soon.'
        ]);
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Message marked as read'
        ]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully'
        ]);
    }
}