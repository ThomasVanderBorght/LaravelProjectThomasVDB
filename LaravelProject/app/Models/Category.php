<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cheese;

class Category extends Model
{
    public const CHEESE = 'cheese';
    public const FAQ = 'faq';
    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    public function kazen()
    {
        return $this->hasMany(Cheese::class, 'categorie_id');
    }

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'categorie_id'); 
    }
}
