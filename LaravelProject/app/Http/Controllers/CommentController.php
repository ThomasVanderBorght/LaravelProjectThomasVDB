<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $news->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
}
