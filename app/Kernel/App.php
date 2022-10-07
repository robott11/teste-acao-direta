<?php

namespace App\Kernel;

use App\Http\Router;
use App\Kernel\Database\DatabaseConnection;

class App
{
    private Router $router;

    public function __construct()
    {
       $this->router = new Router();
       $this->initConfigs();
       DatabaseConnection::init();
    }

    public function run()
    {
        return $this->router->handle();
    }

    private function initConfigs(): void
    {
        if (Enviroment::load(__DIR__)) {
            $GLOBALS['config']['DB_HOST'] = getenv('DB_HOST');
            $GLOBALS['config']['DB_PORT'] = getenv('DB_PORT');
            $GLOBALS['config']['DB_USER'] = getenv('DB_USER');
            $GLOBALS['config']['DB_PWD'] = getenv('DB_PWD');
            $GLOBALS['config']['DB_NAME'] = getenv('DB_NAME');
        }
    }
}