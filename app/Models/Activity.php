<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id', 
        'content', 
        'activitytable_id', 
        'activitytable_type',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function activitytable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'liketable');
    }
}
