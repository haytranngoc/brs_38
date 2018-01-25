<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 
        'follower_id', 
        'status',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function activities()
    {
    	return $this->morphMany(Activity::class, 'activitytable');
    }
}
