<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cheese;

class CheeseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kaas = Cheese::create([
            'name' => 'Gouda',
            'age' => 3,
            'brand' => 'DutchCheese',
            'description' => 'Aged Dutch Gouda Cheese',
            'categorie_id' => 1,
        ]);
    }
}
