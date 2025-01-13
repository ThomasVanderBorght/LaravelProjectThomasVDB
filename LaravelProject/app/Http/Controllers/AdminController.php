<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
 public function index()
    {
        // Only admins can access this view
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->type = 'admin'; // Update user type
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User promoted to Admin!');
    }

    public function removeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->type = 'user'; // Downgrade user to normal
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Admin rights removed!');
    }

    public function createUser()
    {
        return view('admin.users.create'); // Show user creation form
    }

    public function storeUser(Request $request)
    {
        $request->validate([
           'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'type' => 'required|in:user,admin',
            'date_of_birth' => 'nullable|date',
            'about_me' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type,
            'date_of_birth' => $request->date_of_birth,
            'about_me' => $request->about_me,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'New user created successfully!');
    }
}