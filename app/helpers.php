<?php

if (!function_exists('dd')) {
    function dd(mixed ...$vars) {
        foreach ($vars as $var) {
            echo '<pre>';
            print_r($var);
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

if (!function_exists('error')) {
    function error(?string $key): string|array {
        if ($key && isset($_SESSION['errors'][$key])) {
            $error = $_SESSION['errors'][$key];
            unset($_SESSION['errors'][$key]);

            return $error;
        }

        $error = $_SESSION['errors'];
        unset($_SESSION['errors']);

        return $error;
    }
}

if (!function_exists('hasErrors')) {
    function hasErrors(string $key): bool {
        return isset($_SESSION['errors'][$key]);
    }
}

if (!function_exists('convertDateTimeDB')) {
    function convertDateTimeDB(string $dateTime, string $format = 'd/m/Y H:i:s'): string {
        $dateTimeOb = new DateTime($dateTime, new DateTimeZone('America/Sao_Paulo'));

        return $dateTimeOb->format($format);
    }
}

if (!function_exists('convertDateTimeView')) {
    function convertDateTimeView(string $dateTime): string {
        $dateTimeOb = DateTime::createFromFormat('d/m/Y H:i', $dateTime);

        return $dateTimeOb->format('Y-m-d H:i:s');
    }
}

if (!function_exists('asset')) {
    function asset(string $route = ''): string {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = 'https://';
        else
            $url = 'http://';
        $url.= $_SERVER['HTTP_HOST'];

        return $url . $route;
    }
}