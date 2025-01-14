<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'vraagnaam',
        'vraagbody',
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
