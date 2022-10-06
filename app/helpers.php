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