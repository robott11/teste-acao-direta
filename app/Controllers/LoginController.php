<?php

namespace App\Controllers;

class LoginController extends Controller
{
    public function index(): string
    {
        return $this->view('login/index', 'layouts/master', [
            'title' => 'Login'
        ]);
    }
}