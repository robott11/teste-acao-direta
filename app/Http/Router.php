<?php

namespace App\Http;

use App\Exceptions\RouteNotFoundException;
use App\Http\Middlewares\middleware;

class Router
{
    private Request $request;

    private static array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public static function registerRoute(string $method, string $uri, array $action, array|string $middlewares = []): void
    {
        self::$routes[] = new Route($method, $uri, $action, $middlewares);
    }

    public static function get(string $uri, array $action, array|string $middlewares = []): void
    {
        self::registerRoute('GET', $uri, $action, $middlewares);
    }

    public static function post(string $uri, array $action, array|string $middlewares = []): void
    {
        self::registerRoute('POST', $uri, $action, $middlewares);
    }

    public function handle(): Response
    {
        try {
            return (new middleware($this->getRoute()))->next($this->request);
        } catch (RouteNotFoundException $e) {
            return new Response($e->getCode(), View::render('errors/404', [
                'message' => $e->getMessage()
            ]));
        }
    }

    private function getRoute(): Route
    {
        $uri = $this->request->getUri();
        $method = $this->request->getMethod();

        foreach (self::$routes as $route) {
            if ($route->getUri() == $uri && $route->getMethod() == $method) {
                return $route;
            }
        }

        throw new RouteNotFoundException('Erro 404 | Página não encontrada!');
    }
}