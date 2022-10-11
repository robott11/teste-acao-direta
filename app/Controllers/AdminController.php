<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Usuários'
        ];

        return $this->view('admin/index', 'layouts/admin', $data);
    }

    public function loginPage()
    {
        $data = [
            'title' => 'Página de Login'
        ];

        return $this->view('admin/login', 'layouts/admin', $data);
    }

    public function login(Request $request): Response
    {
        $username = $request->user;
        $password = $request->password;

        if (empty($username) || empty($password)) {
            return (new Response())->redirect('/admin/login')->withError('login', 'Os campos de usuário e senha são obrigatórios.');
        }

        $admin = Admin::where('username', '=', $username)->get();
        if (!$admin || !password_verify($password, $admin->password)) {
            return (new Response(200))->redirect('/admin/login')->withError('login', 'Credenciais incorretas.');
        }

        Auth::flashSession($admin, 'admin');

        return (new Response)->redirect('/admin');
    }
}