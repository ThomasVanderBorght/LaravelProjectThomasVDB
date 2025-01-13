<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controller\CheeseController;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $categorie)
    {
        // Fetch all Kazen related to the category
        $kazen = $categorie->kazen;

        // Return a view and pass the category & kazen
        return view('categories.show', compact('categorie', 'kazen'));
    }
}
