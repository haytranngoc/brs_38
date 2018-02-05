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

    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function getImagesAttribute($value)
    {
        return asset(config('setting.images_path') . '/' . $value);
    }
}
