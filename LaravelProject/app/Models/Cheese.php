<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cheese extends Model
{


    protected $fillable = [
        'name', 
        'age', 
        'brand', 
        'description', 
        'categorie_id'
    ];

    public function categorie()
{
    return $this->belongsTo(Category::class, 'categorie_id');
}
}
