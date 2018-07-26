<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function addComment($body)
    {
        $comment = new Comment;
        $comment->body = $body;
        $comment->cat_id = $this->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
    }

    public function addRating($value)
    {
        $this->ratings()->create(compact('value'));
    }
}
