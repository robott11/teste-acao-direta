<?php

namespace App\Http\Middlewares;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use Closure;

class checkAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return (new Response(302, ''))->redirect('/login');
        }

        return $next($request);
    }
}