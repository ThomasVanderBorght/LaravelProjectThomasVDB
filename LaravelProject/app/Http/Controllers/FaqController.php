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

        // If a category is selected, filter FAQs
        if ($request->has('category')) {
            $selectedCategory = Category::findOrFail($request->category);
            $faqs = FAQ::where('categorie_id', $selectedCategory->id)->get();
        } else {
            $selectedCategory = null;
            $faqs = FAQ::all(); // Show all FAQs if no category is selected
        }

        return view('faq.index', compact('faqs', 'faqCategories', 'selectedCategory'));
    }
}