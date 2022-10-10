<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use App\Models\Point;
use App\Models\User;

class HomeController extends Controller
{
    public function index(): Response
    {
        $user = Auth::getAuthUser();

        $data = [
            'title' => 'Home page',
            'user' => $user,
            'points' => Point::getPointsByUserId($user->id)
        ];

        return $this->view('home/index', 'layouts/home', $data);
    }

    public function hitPoint(Request $request): Response
    {
        if (!$user = User::getById($request->user)) {
            return (new Response(200, 'Usuário não encontrado!', 'application/json'));
        }

        $lastPoint = Point::getLastPointFromUser($user->id);

        if (!$lastPoint) {
            $point = Point::create([
                'user_id' => $user->id
            ]);

            return (new Response(200, $point->toArray(), 'application/json'));
        }

        $point = Point::create([
            'user_id' => $user->id,
            'is_entrance' => $lastPoint->is_entrance == 0 ? 1 : 0
        ]);

        return (new Response(200, $point->toArray(), 'application/json'));
    }
}