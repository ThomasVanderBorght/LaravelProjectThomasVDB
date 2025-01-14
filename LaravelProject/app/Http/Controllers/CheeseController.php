<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheese;
use App\Models\Category;

class CheeseController extends Controller
{
    public function index(Request $request)
    {
        // Fetch categories of type 'cheese' for the category list
        $cheeseCategories = Category::where('type', 'cheese')->get();

        // If a category is selected, filter cheeses
        if ($request->has('category')) {
            $selectedCategory = Category::findOrFail($request->category);
            $kazen = Cheese::where('categorie_id', $selectedCategory->id)->get();
        } else {
            $selectedCategory = null;
            $kazen = Cheese::all();
        }

        return view('cheeses.index', compact('kazen', 'cheeseCategories', 'selectedCategory'));
    }
}