<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheese;
use App\Models\Category;

class CheeseController extends Controller
{
    public function index(Request $request)
    {
        $cheeseCategories = Category::where('type', 'cheese')->get();

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