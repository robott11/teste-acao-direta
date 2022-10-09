<?php

namespace App\Http\Middlewares;

use App\Http\Request;
use Closure;

class checkAuth
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}