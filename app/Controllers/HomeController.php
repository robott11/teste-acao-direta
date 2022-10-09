<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $data = [
            'title' => 'Home page'
        ];

        return $this->view('home/index', 'layouts/master', $data);
    }
}