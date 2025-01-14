<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQ::Create([
            'vraagnaam' => 'Hoe koop ik een kaas',
            'vraagbody' => 'door op het winkelmandje bij de specifieke kaas te klikken',
            'categorie_id' => 2,
        ]);
    }
}
