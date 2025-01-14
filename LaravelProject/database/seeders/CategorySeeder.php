<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = Category::create([
            'name' => 'zacht',
            'description' => 'alle zachte kazen',
            'type' => Category::CHEESE,
        ]);

        $categorie = Category::create([
            'name' => 'veelgestende vragen',
            'description' => 'alle  vaak voorkomende vragen',
            'type' => Category::FAQ,
        ]);
    }
}
