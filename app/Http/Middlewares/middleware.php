<?php

namespace App\Http\Middlewares;

use App\Http\Request;
use App\Http\Response;
use App\Http\Route;

class middleware
{
    private Route $route;

    private array $middlewares;

    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->middlewares = $route->getMiddlewares();
    }

    public function next(Request $request): Response
    {
        if (empty($this->middlewares))
            return $this->route->callAction($request);

        $middleware = array_shift($this->middlewares);

        $queue = $this;
        $next  = function($request) use($queue) {
            return $queue->next($request);
        };

        return (new $middleware)->handle($request, $next);
    }
}