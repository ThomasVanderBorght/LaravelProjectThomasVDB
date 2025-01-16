<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::all(), // Empty users list initially
        ]);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');

        // Fetch users based on search query, excluding private profiles
        $users = User::query()
            ->where('privacy_mode', false) // Only public profiles
            ->where(function ($q) use ($query) {
                $q->where('username', 'LIKE', "%{$query}%")
                  ->orWhere('about_me', 'LIKE', "%{$query}%");
            })
            ->get();

        return view('users.index', compact('users'));
    }
}
