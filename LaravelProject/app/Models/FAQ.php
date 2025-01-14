<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'vraagnaam',
        'vraagbody',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
