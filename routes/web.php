<?php

use App\Http\Router;
use App\Controllers\HomeController;

Router::get('/home', [HomeController::class, 'test']);
Router::post('/home', [HomeController::class, 'store']);
