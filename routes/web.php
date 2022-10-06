<?php

use App\Http\Router;
use App\Controllers\LoginController;
use App\Controllers\HomeController;

Router::get('/login', [LoginController::class, 'index']);
Router::get('/home', [HomeController::class, 'test']);
Router::post('/home', [HomeController::class, 'store']);
