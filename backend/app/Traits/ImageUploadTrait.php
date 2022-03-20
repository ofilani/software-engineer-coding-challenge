<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageUploadTrait
{
    // protected $path  = 'app/public/images/';
    protected $path  = 'images/';

    public function uploadImage($name, $img, $folderName, $image_width = NULL, $image_height = NULL): string
    {
        $image_name = $this->randomImageName($name, $img);

        $foo = Image::make($img->getRealPath())->resize($image_width, $image_height)->save($this->path . $folderName . '/' . $image_name);

        return $image_name;
    }



    protected function imageName($imageName, $image): string
    {
        return Str::slug($imageName) . '.' . $image->getClientOriginalExtension();
    }

    protected function randomImageName($imageName, $image): string
    {
        return Str::slug($imageName) . '-' . time() . '.' . $image->getClientOriginalExtension();
    }
}
