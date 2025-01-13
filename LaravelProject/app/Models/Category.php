<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cheese;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function kazen()
    {
        return $this->hasMany(Cheese::class, 'categorie_id'); // One category has many Kazen
    }
}
