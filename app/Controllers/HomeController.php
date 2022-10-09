<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class HomeController extends Controller
{
    public function test(Request $request): Response
    {
        return new Response(200, 'FUNCIONOU: '. $request->getUri());
    }
}