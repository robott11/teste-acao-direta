<?php

namespace App\Http;

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
        self::$routes[] = new Route($method, $uri, $action);
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
            return $this->getRoute()->callAction($this->request);
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getCode());
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

        throw new \Exception('ROTA NÂO ENCONTRADA!', 404);
    }
}