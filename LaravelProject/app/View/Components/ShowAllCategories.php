<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class ShowAllCategories extends Component
{
    public $routeName;
    public $categories;
    public $selectedCategory;
    public $label;

    public function __construct($routeName, $selectedCategory = null, $categories = [], $label = 'Categories')
    {
        $this->routeName = $routeName;
        $this->selectedCategory = $selectedCategory;
        $this->categories = $categories ?? collect();
        $this->label = $label;
    }

    public function render()
    {
        return view('components.show-all-categories');
    }
}
