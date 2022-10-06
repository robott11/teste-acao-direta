<?php

namespace App\Controllers;

use App\Http\View;

abstract class Controller
{
    private function getPage(string $layout, $data): string
    {
        return View::render($layout, $data);
    }

    protected function view(string $view, string $layout, array $data = []): string
    {
        $content = View::render($view, $data);

        $data = array_merge($data, [
            'content' => $content
        ]);

        return $this->getPage($layout, $data);
    }
}