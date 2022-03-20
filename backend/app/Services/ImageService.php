<?php

namespace App\Services;


use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\File;

class ImageService
{
    use ImageUploadTrait;

    public function storeProductImage($fileName, $image): string
    {
        return $this->uploadImage(
            $fileName,
            $image,
            'products',
            500,
            500
        );
    }

    public function unlinkImage($image, $folderName)
    {
        if (File::exists('images/' . $folderName . '/' . $image)) {
            unlink('images/' . $folderName . '/' . $image);
        }
    }
}
