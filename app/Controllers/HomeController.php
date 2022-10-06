<?php

namespace App\Controllers;

use App\Http\Request;

class HomeController extends Controller
{
    public function test(Request $request)
    {
        return 'Hello World: ' . $request->getUri();
    }
}