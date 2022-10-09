<?php

use App\Controllers\HomeController;
use App\Http\Middlewares\checkAuth;
use App\Http\Router;

Router::get('/', [HomeController::class, 'index'], checkAuth::class);
