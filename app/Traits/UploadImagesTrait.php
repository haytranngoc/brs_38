<?php
namespace App\Traits;

use Auth;

trait UploadImagesTrait
{
	public function uploadimages($request)
	{
		$file = $request->file('images');
        if ($request->hasFile('images')) {
            $images = str_slug(	$file->getClientOriginalExtension());
            $file->move('storage/images', $images);
        } else {
            $images = 'default.jpg';
        }

        return compact('images', 'user');
	}
}
