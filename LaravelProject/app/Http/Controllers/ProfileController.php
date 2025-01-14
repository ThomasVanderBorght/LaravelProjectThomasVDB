<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $path = $user->profile_picture; // Keep current profile picture
    
        // Handle Profile Picture Upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
    
            if ($file->isValid()) {
                // Delete old profile picture if it's not the placeholder
                if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture) && $user->profile_picture !== 'profile_pictures/placeholder.png') {
                    Storage::disk('public')->delete($user->profile_picture);
                }
    
                // Save new profile picture
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profile_pictures', $filename, 'public'); 
            } else {
                return Redirect::route('profile.edit')->withErrors(['profile_picture' => 'The uploaded file is not valid.']);
            }
        }
    
        // Update User Fields
        $user->fill([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'about_me' => $request->about_me,
            'privacy_mode' => $request->privacy_mode,
            'profile_picture' => $path, // Update profile picture path
        ]);
    
        // Reset email verification if the email was changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
