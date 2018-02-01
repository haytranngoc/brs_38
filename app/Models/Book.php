<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id', 
        'images', 
        'title', 
        'publish_date', 
        'author', 
        'number_pages',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class)->withPivot('read_status', 'favorite');
    }

    public function ratings()
    {
    	return $this->belongsToMany(User::class, 'ratings', 'book_id', 'user_id')->withPivot('rating');
    }

    public function reviews()
    {
    	return $this->belongsToMany(User::class, 'reviews', 'book_id', 'user_id')->withPivot('content');
    }

    public function owners()
    {
        return $this->belongsToMany(User::class, 'owners', 'book_id', 'user_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function getImagesPathAttribute()
    {
        return Storage::url(config('setting.images_path'). $this->images);
    }
}
