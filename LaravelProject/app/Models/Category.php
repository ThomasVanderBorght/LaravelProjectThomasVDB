<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cheese;

class Category extends Model
{
    public const USER = 'cheese';
    public const ADMIN = 'faq';
    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    public function kazen()
    {
        return $this->hasMany(Cheese::class, 'categorie_id'); // One category has many Kazen
    }
}
