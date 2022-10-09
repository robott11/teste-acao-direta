<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Http\Middlewares\checkAuth;
use App\Http\Router;

Router::get('/', [HomeController::class, 'index'], checkAuth::class);
Router::get('/login', [LoginController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);
