<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'book_id', 
        'name',
    ];

    public function suggests()
    {
    	return $this->belongsToMany(User::class, 'suggests', 'category_id', 'user_id')->withPivot('title', 'author', 'description', 'link', 'status');
    }

    public function books()
    {
    	return $this->hasMany(Book::class);
    }
}
