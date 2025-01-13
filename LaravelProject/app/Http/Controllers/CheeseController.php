<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheese;

class CheeseController extends Controller
{
    public function index()
    {
        $kazen = Cheese::all();
        return view('cheeses.index', compact('kazen'));
    }
}
