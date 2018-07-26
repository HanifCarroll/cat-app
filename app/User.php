<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cats()
    {
        return $this->hasMany(Cat::class);
    }

    public function createCat(Cat $cat)
    {
        $this->cats()->save($cat);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function createRating(Rating $rating)
    {
        $this->ratings()->save($rating);
    }
}
