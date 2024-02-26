<?php
namespace App;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . 'vendor/autoload.php';

use App\Config\Database;
use App\Models\User;
use App\Controllers\Users\UsersController;
use App\Controllers\Users\AuthController;
use App\Router;

$router = new Router;
$router->run();