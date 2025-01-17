<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'reason',
        'reported_user_id',
        'message',
        'email', 
        'is_answered',
        'response', 
        'answered_by'
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    public function ResponsePerson()
    {
        return $this->belongsTo(User::class, 'answered_by');
    }
}
