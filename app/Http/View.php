<?php

namespace App\Http;

class View
{
    public static function render(string $view, array $data): string
    {
        extract($data);

        ob_start();

        include __DIR__ . '/../../views/' . $view . '.php';
        $contents = ob_get_contents();

        ob_end_clean();

        return $contents;
    }
}