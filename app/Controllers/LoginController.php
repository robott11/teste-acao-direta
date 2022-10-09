<?php

namespace App\Controllers;

use App\Http\Response;

class LoginController extends Controller
{
    public function index(): Response
    {
        return $this->view('login/index', 'layouts/master', [
            'title' => 'Login'
        ]);
    }
}