<?php

namespace App\Http;

use App\Controllers\Controller;

class Router
{
    private Request $request;

    private static array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public static function registerRoute(string $method, string $uri, array $action): void
    {
        self::$routes[$uri][$method] = $action;
    }

    public static function get(string $uri, array $action): void
    {
        self::registerRoute('GET', $uri, $action);
    }

    public static function post(string $uri, array $action): void
    {
        self::registerRoute('POST', $uri, $action);
    }

    public function handle(): Response
    {
        try {
            $action = $this->getRoute();
            $controller = new $action[0];
            $content = call_user_func([$controller, $action[1]], $this->request);

            return new Response($content);
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getCode());
        }
    }

    private function getRoute()
    {
        $uri = $this->request->getUri();
        $method = $this->request->getMethod();

        foreach (self::$routes as $route => $routeMethod) {
            if (($route == $uri) && isset($routeMethod[$method])) {
                return $routeMethod[$method];
            }
        }

        throw new \Exception('ROTA NÂO ENCONTRADA!', 404);
    }
}