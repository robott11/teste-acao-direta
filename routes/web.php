<?php

use App\Http\Router;
use App\Controllers\LoginController;
use App\Controllers\HomeController;
use App\Http\Middlewares\checkAuth;

Router::get('/home', [HomeController::class, 'test'], checkAuth::class);
Router::post('/home', [HomeController::class, 'store']);
Router::get('/login', [LoginController::class, 'index']);
