<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get(); // Show newest first
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'reported_user' => 'nullable|string|exists:users,username',
            'message' => 'required|string',
        ]);

        // Get reported user ID if it's a user report
        $reportedUser = null;
        if ($request->reason === 'report_user' && $request->reported_user) {
            $reportedUser = User::where('username', $request->reported_user)->firstOrFail();
        }
        Contact::create([
            'user_id' => Auth::user()->id,
            'reported_user_id' => $reportedUser->id ? $reportedUser->id : null,
            'reason' => $request->reason,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent.');
    }
}

