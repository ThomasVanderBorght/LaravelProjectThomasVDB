<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends Controller
{  
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }
   
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'news_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publicationDate' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('news_picture')) {
            $imagePath = $request->file('news_picture')->store('news_picture', 'public');
        }

        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'news_picture' => $imagePath,
            'publicationDate' => $request->publicationDate,
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully!');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'news_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publicationDate' => 'required|date',
        ]);

        if ($request->hasFile('news_picture')) {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('news_picture')->store('news_images', 'public');
        }

        $news->update($request->except('news_picture'));

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}
