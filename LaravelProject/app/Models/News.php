<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class News extends Model
{
    protected $fillable = [
        'title',
        'news_picture',
        'body',
        'publicationDate',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }
}
