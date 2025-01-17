<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Contact;
use App\Models\Comment;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public const USER = 'user';
    public const ADMIN = 'admin';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'type',
        'date_of_birth',
        'about_me',
        'profile_picture',
        'privacy_mode',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getFormattedType()
    {
        return ucfirst($this->type); 
    }

    public function user()
    {
        return $this->hasMany(Contact::class, 'user_id');
    }

    public function reportedUser()
    {
        return $this->hasMany(Contact::class, 'reported_user_id');
    }

    public function ResponsePerson()
    {
        return $this->hasMany(Contact::class, 'answered_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    }

