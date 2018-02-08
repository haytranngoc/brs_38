<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{    
    protected $fillable = [
        'user_id', 
        'book_id',
        'owner_id',
        'status', 
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
