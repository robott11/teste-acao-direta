<?php

namespace App\Controllers;

use App\Http\Request;

class HomeController extends Controller
{
    public function test(Request $request): string
    {
        $uri = $request->getUri();

        return $this->view('home/index', [
            'uri' => $uri
        ]);
    }
}