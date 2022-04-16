<?php

namespace App\Http\traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait AddRemoveImageTrait {
    /**
    * Upload image according to given data and return Image Name
    * @return string
   */
    public function uploadImage($data)
    {
        File::makeDirectory($data['path'], 0755, true, true);

        $image = $data['image'];

        $imageName = Str::slug($data['title']).'-'.time().'.'.$image->getClientOriginalExtension();

        $image->move($data['path'], $imageName);

        return $imageName;
    }

    /**
     * remove/unlink image from given imagePath...
     * @return void
     */
    public function removeUploadImage($image, $imagePath){

        $imagePath = $imagePath.$image;
        if(is_file($imagePath)) {
            unlink($imagePath);
        }
    }
}
