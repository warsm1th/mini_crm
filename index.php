<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Database, App\Router, App\Models\User, App\Controllers\Users\UsersController, App\Controllers\Users\AuthController, App\Controllers\HomeController;

$router = new Router;
$router->run();