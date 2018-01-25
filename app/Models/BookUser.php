<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $fillable = [
        'user_id', 
        'book_id', 
        'read_status', 
        'favorite',
    ];

    public function activities()
    {
    	return $this->morphMany(Activity::class, 'activitytable');
    }
}
