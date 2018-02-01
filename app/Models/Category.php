<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'images',
    ];

    public function suggests()
    {
    	return $this->belongsToMany(User::class, 'suggests', 'category_id', 'user_id')->withPivot('title', 'author', 'description', 'link', 'status');
    }

    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function getImagesPathAttribute()
    {
        return Storage::url(config('setting.images_path'). $this->images);
    }
}
