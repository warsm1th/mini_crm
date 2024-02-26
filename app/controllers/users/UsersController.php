<?php
namespace App\Users\Controllers;

require_once __DIR__ . 'vendor/autoload.php';

use App\Models\User;

class UsersController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }
}