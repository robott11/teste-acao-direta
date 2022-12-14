<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use App\Models\Admin;
use App\Models\Point;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();

        if (!is_array(User::get()) && isset($users)) {
            $users = [
                0 => User::get()
            ];
        }

        $data = [
            'title' => 'Usuários',
            'users' => $users
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

    public function logout(): Response
    {
        if (Auth::getAuthUser('admin')) {
            Auth::logout('admin');

            return (new Response)->redirect('/admin');
        }
    }

    public function newUser()
    {
        $data = [
            'title' => 'Criar novo usuário'
        ];

        return $this->view('admin/newUser', 'layouts/admin', $data);
    }

    public function storeUser(Request $request)
    {
        $username = $request->username;
        $name = $request->name;
        $password = $request->password;

        if (empty($username) || empty($name) || empty($password)) {
            return (new Response())->redirect('/admin/new-user')->withError('register', 'Os campos de usuário e senha são obrigatórios.');
        }

        User::create([
            'username' => $username,
            'name' => $name,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        return (new Response())->redirect('/admin');
    }

    public function getUser(Request $request)
    {
        $user = User::getById($request->id);
        $points = Point::getPointsByUserId($request->id);

        $data = [
            'title' => $user->name,
            'points' => $points
        ];

        if ($request->getMethod() == 'POST') {
            $data['points'] = Point::where('user_id', '=', $request->id)
                    ->where('hour', '>=', convertDateTimeView($request->start_date))
                    ->where('hour', '<=', convertDateTimeView($request->end_date))
                    ->get();
        };

        return $this->view('admin/user', 'layouts/admin', $data);
    }
}