<?php


namespace App\Service;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class File
{
    /**
     * @param UploadedFile $file
     */
    public function saveFile($file)
    {
        $fileName = Str::random(15);
        $fileExtension = $file->getClientOriginalExtension();
        $file->storeAs('public', $fileName . '.' . $fileExtension);

        return $fileName . '.' . $fileExtension;
    }
}
