<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble
{
    /**
     * @param UploadedFile $file
     * @param string|null $folder
     * @param string $disk
     * @param string|null $filename
     * @return string
     */
    public function uploadOne(UploadedFile $file, ?string $folder = null, string $disk = 'public', ?string $filename = null): string
    {
        $name = $filename ?? Str::random(25);

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            ['disk' => $disk]
        );
    }

    /**
     * @param string|null $path
     * @param string $disk
     * @return bool
     */
    public function deleteOne(?string $path = null, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->delete($path);
    }
}
