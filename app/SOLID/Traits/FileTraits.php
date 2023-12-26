<?php

namespace App\SOLID\Traits;

trait FileTraits
{
    public function uploadFile($file,$path, $renameFile = null)
    {
        if(!empty($file)) {
            $filename = time() . '.' . $file->extension();
            if (!file_exists($path)) {
                mkdir($path , 0777, true);
            }
            $location = $file->move($path, $filename);
            return $path. '/' . $filename;
        }
    }
}
