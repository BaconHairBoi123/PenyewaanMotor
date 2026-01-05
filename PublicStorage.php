<?php

namespace App\Helpers;

class PublicStorage
{
    public static function sync(string $path): void
    {
        $source = storage_path('app/public/' . $path);
        $destination = public_path('storage/' . $path);

        // Buat folder jika belum ada
        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0755, true);
        }

        // Copy file
        if (file_exists($source)) {
            copy($source, $destination);
        }
    }

    public static function delete(string $path): void
    {
        $publicFile = public_path('storage/' . $path);
        if (file_exists($publicFile)) {
            unlink($publicFile);
        }
    }
}
