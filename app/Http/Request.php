<?php

namespace App\Http;

class Request
{
    private string $uri;

    private string $method;

    private array $queryParams = [];

    private array $postVars = [];

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
    }

    public function __get(string $name): mixed
    {
        if (isset($this->queryParams[$name])) {
            return $this->queryParams[$name];
        } else {
            return $this->postVars[$name];
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
}