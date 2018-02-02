<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 
        'book_id',
        'content',
    ];

    public function comments()
    {
    	return $this->belongsToMany(User::class, 'comments', 'review_id', 'user_id')->withPivot('content');
    }

    public function activities()
    {
    	return $this->morphMany(Activity::class, 'activitytable');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function commentReviews()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
