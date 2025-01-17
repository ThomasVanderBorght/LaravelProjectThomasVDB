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
        $contacts = Contact::with('ResponsePerson')->latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function Userindex()
    {
        $contacts = Contact::where('user_id', auth()->id())->latest()->get();

        return view('contact.index', compact('contacts'));
    }

    public function respond(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|max:2000',
        ]);

       $contactForm = Contact::findOrFail($id);

    $contactForm->response = $request->response;
    $contactForm->is_answered = true;
    $contactForm->answered_by = auth()->id();

    if ($contactForm->save()) {
        return redirect()->route('admin.contacts.index')->with('success', 'Antwoord verzonden.');
    } else {
        return redirect()->route('admin.contacts.index')->with('error', 'Kon antwoord niet opslaan.');
    }
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

        $reportedUser = null;
        if ($request->reason === 'report_user' && $request->reported_user) {
            $reportedUser = User::where('username', $request->reported_user)->firstOrFail();
        }
        Contact::create([
            'user_id' => Auth::user()->id,
            'reported_user_id' => $reportedUser?->id,
            'reason' => $request->reason,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact message deleted successfully.');
    }

}

