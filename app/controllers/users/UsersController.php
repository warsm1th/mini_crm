<?php
namespace App\Controllers\Users;
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