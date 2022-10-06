<?php

namespace App\Kernel;

use App\Http\Router;

class App
{
    private Router $router;

    public function __construct()
    {
       $this->router = new Router();
    }

    public function run()
    {
        return $this->router->handle();
    }
}