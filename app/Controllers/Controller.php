<?php

namespace App\Controllers;

use App\Http\Response;
use App\Http\View;;

abstract class Controller
{
    private function getPage(string $layout, $data): Response
    {
        return new Response(200, View::render($layout, $data));
    }

    protected function view(string $view, string $layout, array $data = []): Response
    {
        $content = View::render($view, $data);

        $data = array_merge($data, [
            'content' => $content
        ]);

        return $this->getPage($layout, $data);
    }
}