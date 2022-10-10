<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(): Response
    {
        return $this->view('login/index', 'layouts/master', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request): Response
    {
        $username = $request->user;
        $password = $request->password;

        if (empty($username) || empty($password)) {
            return (new Response(200))->redirect('/login')->withError('login', 'Os campos de usuário e senha são obrigatórios.');
        }

        $user = User::where('username', '=', $username)->get();
        if (!$user || !password_verify($password, $user->password)) {
            return (new Response(200))->redirect('/login')->withError('login', 'Credenciais incorretas.');
        }

        Auth::flashSession($user);

        return (new Response)->redirect('/');
    }

    public function logout(): Response
    {
        if (Auth::getAuthUser()) {
            Auth::logout();

            return (new Response)->redirect('/login');
        }
    }
}