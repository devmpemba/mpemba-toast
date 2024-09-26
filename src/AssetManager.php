<?php

namespace SalimMbise\ToastLibrary;

class AssetManager
{
    public static function copyAssets()
    {
        $sourceDir = __DIR__ . '/../assets';
        $destinationDir = __DIR__ . '/../../public/vendor/mpemba-toast';

        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0777, true);
        }

        // Copy CSS files
        self::copyDirectory("{$sourceDir}/css", "{$destinationDir}/css");
        // Copy JS files
        self::copyDirectory("{$sourceDir}/js", "{$destinationDir}/js");
    }

    private static function copyDirectory($source, $destination)
    {
        // Ensure source directory exists
        if (!is_dir($source)) {
            return;
        }

        // Create destination directory if not exists
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        // Open the source directory
        $directoryIterator = new \DirectoryIterator($source);

        foreach ($directoryIterator as $item) {
            if ($item->isDot()) {
                continue;
            }

            $sourcePath = $item->getPathname();
            $relativePath = str_replace($source, '', $sourcePath);
            $targetPath = $destination . DIRECTORY_SEPARATOR . ltrim($relativePath, DIRECTORY_SEPARATOR);

            if ($item->isDir()) {
                // Recursively copy directories
                self::copyDirectory($sourcePath, $targetPath);
            } else {
                // Copy files
                copy($sourcePath, $targetPath);
            }
        }
    }
}
