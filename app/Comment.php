<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'cat_id', 'body'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
