<?php

namespace SalimMbise\ToastLibrary;

class AssetManager
{
    public static function copyAssets()
    {
        $publicDir = __DIR__ . '/../../public/vendor/mpemba-toast/';
        $sourceDir = __DIR__ . '/../assets/';

        self::ensureDirectoryExists($publicDir);

        // Copy CSS files
        self::copyDirectory($sourceDir . 'css/', $publicDir . 'css/');

        // Copy JS files
        self::copyDirectory($sourceDir . 'js/', $publicDir . 'js/');
    }

    private static function ensureDirectoryExists($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    private static function copyDirectory($sourceDir, $destDir)
    {
        $files = glob($sourceDir . '*');
        foreach ($files as $file) {
            $dest = $destDir . basename($file);
            if (is_dir($file)) {
                self::ensureDirectoryExists($dest);
                self::copyDirectory($file . '/', $dest . '/');
            } else {
                copy($file, $dest);
            }
        }
    }
}
