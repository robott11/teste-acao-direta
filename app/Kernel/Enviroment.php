<?php

namespace App\Kernel;

class Enviroment
{
    public static function load(string $dir): bool
    {
        $path = $dir . '/../../.env';

        if (!file_exists($path)) {
            return false;
        }

        $lines = file($path);
        foreach ($lines as $line) {
            putenv(trim($line));
        }

        return true;
    }
}