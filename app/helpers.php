<?php

if (!function_exists('dd')) {
    function dd(mixed ...$vars) {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }

        exit;
    }
}

if (!function_exists('config')) {
    function config(string $key): string|null {
        if (isset($GLOBALS['config'][$key])) {
            return $GLOBALS['config'][$key];
        }

        return null;
    }
}