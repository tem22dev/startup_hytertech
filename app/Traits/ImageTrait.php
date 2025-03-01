<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

trait ImageTrait
{
    public static function storeImage($imageFile, $folder, $isAvatar = false, $isThumb = false)
    {
        $imageManager = new ImageManager();
        $hash = date('YmdHis') . Str::random(10);
        $imageFileName = 'image_' . $hash . '.jpg';
        $imageFileNameAvatar = 'avatar_image_' . $hash . '.jpg';
        $imageFileNameThumb = 'thumb_image_' . $hash . '.jpg';
        $imagePath = "assets/$folder/";
        $imageFullPath = $imagePath . $imageFileName;
        $imageFullPathAvatar = $imagePath . $imageFileNameAvatar;
        $imageFullPathThumb = $imagePath . $imageFileNameThumb;

        if (!Storage::disk('public_path')->exists($imagePath)) {
            Storage::disk('public_path')->makeDirectory($imagePath);
        }

        if ($isAvatar) {
            $img = $imageManager->make($imageFile);
            $img->orientate()->resize(150, 150)->save($imageFullPathAvatar, 60);
            return [
                'avatar' => $imageFullPathAvatar,
            ];
        }
    
        if ($isThumb) {
            $img = $imageManager->make($imageFile);
            $img->orientate()->save($imageFullPathThumb, 60);
            return [
                'thumb' => $imageFullPathThumb,
            ];
        }

        $img = $imageManager->make($imageFile);
        $img->orientate()->save($imageFullPath, 100);
    
        return [
            'url' => $imageFullPath,
        ];
    }

    public static function deleteImage($imagePath)
    {
        Storage::disk('public_path')->delete($imagePath);
    }
}