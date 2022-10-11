<?php

use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Http\Middlewares\checkAdminAuth;
use App\Http\Middlewares\checkAuth;
use App\Http\Router;

Router::get('/', [HomeController::class, 'index'], checkAuth::class);
Router::get('/login', [LoginController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);
Router::get('/logout', [LoginController::class, 'logout']);
Router::get('/point', [HomeController::class, 'hitPoint']);
Router::get('/admin', [AdminController::class, 'index'], checkAdminAuth::class);
Router::get('/admin/login', [AdminController::class, 'loginPage']);
Router::post('/admin/login', [AdminController::class, 'login']);
Router::get('/admin/logout', [AdminController::class, 'logout']);
Router::get('/admin/new-user', [AdminController::class, 'newUser']);
Router::post('/admin/new-user', [AdminController::class, 'storeUser']);
Router::get('/admin/user', [AdminController::class, 'getUser']);
Router::post('/admin/user', [AdminController::class, 'getUser']);