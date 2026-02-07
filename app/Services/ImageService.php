<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function upload(UploadedFile $file, string $folder = 'products'): string
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs($folder, $filename, 'public');
    }

    public function delete(string $path): bool
    {
        return Storage::disk('public')->exists($path)
            ? Storage::disk('public')->delete($path)
            : false;
    }
}
