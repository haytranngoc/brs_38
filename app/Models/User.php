<?php

namespace App\Models;

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
        'name', 
        'email', 
        'password', 
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('read_status', 'favorite');
    }

    public function ratings()
    {
        return $this->belongsToMany(Book::class, 'ratings', 'user_id', 'book_id')->withPivot('rating');
    }

    public function reviews()
    {
        return $this->belongsToMany(Book::class, 'reviews', 'user_id', 'book_id')->withPivot('content');
    }

    public function owners()
    {
        return $this->belongsToMany(Book::class, 'owner', 'user_id', 'book_id');
    }
    
    public function suggests()
    {
        return $this->belongsToMany(Category::class, 'suggests', 'user_id', 'category_id')->withPivot('title', 'author', 'description', 'link', 'status');
    }

    public function comments()
    {
        return $this->belongsToMany(Review::class, 'comments', 'user_id', 'review_id')->withPivot('content');
    }

    public function followers()
    {
        return $this->hasMany(Follower::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
