<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;
use App\Models\Category;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        // Fetch only FAQ categories
        $faqCategories = Category::where('type', 'faq')->get();

        $selectedCategory = null;

        // If a category is selected, filter FAQs
        if ($request->has('category')) {
            $selectedCategory = Category::findOrFail($request->category);
            $faqs = $selectedCategory ? $selectedCategory->faqs : collect();
        } else {
            $selectedCategory = null;
            $faqs = FAQ::all(); // Show all FAQs if no category is selected
        }
        

        return view('faq.index', compact('faqs', 'faqCategories', 'selectedCategory'));
    }

    public function adminIndex()
    {
        $faqs = FAQ::with('categorie')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = Category::where('type', 'faq')->get(); // Get only FAQ categories
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vraagnaam' => 'required|string|max:255',
            'vraagbody' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $category = Category::findOrFail($request->categorie_id);

        $faq = FAQ::create([
            'vraagnaam' => $request->vraagnaam,
            'vraagbody' => $request->vraagbody,
            'categorie_id' => $category->id, // Ensure the correct ID is stored
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully!');
    }

    public function edit(FAQ $faq)
    {
        $categories = Category::where('type', 'faq')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'vraagnaam' => 'required|string|max:255',
            'vraagbody' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
    }
}