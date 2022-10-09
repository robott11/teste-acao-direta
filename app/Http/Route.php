<?php

namespace App\Http;

use Closure;

class Route
{
    private string $method = 'GET';

    private string $uri = '';

    private array $middlewares = [];

    private $action;

    public function __construct(string $method, string $uri, array|Closure $action, string|array $middlewares = [])
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->action = $action;
        $this->setMiddlewares($middlewares);
    }

    public function callAction(Request $request): Response
    {
        $action = $this->action;

        if ($this->action instanceof Closure) {
            return $action($request);
        }

        $controller = new $action[0];
        $action = $action[1];

        return call_user_func([$controller, $action], $request);
    }

    public function setMiddlewares(string|array $middlewares): void
    {
        if (!is_array($middlewares)) {
            $this->middlewares[] = $middlewares;
            return;
        }

        foreach ($middlewares as $middleware) {
            $this->middlewares[] = $middleware;
        }
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): string
    {
        return $this->uri;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}