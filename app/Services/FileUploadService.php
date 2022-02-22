<?php

namespace App\Services;

class FileUploadService {
    
    public function saveItemImage($image){
        $path = '';
        if(isset($image) === true){
            $path = $image->store('items', 'public');
        }
        return $path;
    }
        
}