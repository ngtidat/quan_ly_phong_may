<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadFile
{
    /**
     * return name file
     *
     * @param $fileImage
     * @param $pathFolder
     * @return mixed|string
     */
    public static function saveFile($file, $pathFolder)
    {
        $nameFilePath = $file->store($pathFolder);
        $nameFilePath = explode('/', $nameFilePath);
        $nameFilePath = $nameFilePath[2];
        return $nameFilePath;
    }
}
