<?php

namespace App\Controllers;

class Controller
{
    protected function view(string $view, array $data = []): string
    {
        extract($data);

        ob_start();
        include __DIR__ . '/../../views/' . $view . '.php';

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}