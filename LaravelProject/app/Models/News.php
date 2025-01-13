<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'Title',
        'news_picture',
        'Body',
        'publicationDate',
    ];
}
