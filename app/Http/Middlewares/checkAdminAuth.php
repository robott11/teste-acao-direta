<?php

namespace App\Http\Middlewares;

use App\Http\Request;
use App\Http\Response;
use App\Kernel\Auth;
use Closure;

class checkAdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check('admin')) {
            return (new Response(302, ''))->redirect('/admin/login');
        }

        return $next($request);
    }
}