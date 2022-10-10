<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;

class HomeController extends Controller
{
    public function index(): Response
    {
        $data = [
            'title' => 'Home page',
            'user' => Auth::getAuthUser()
        ];

        return $this->view('home/index', 'layouts/master', $data);
    }
}