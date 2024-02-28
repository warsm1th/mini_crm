<?php
namespace App\Controllers\Users;
use App\Models\User;

class UsersController
{
    public function index():void
    {
        $userModel = new User();
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }

    public function create():void
    {
        include 'app/views/users/create.php';
    }

    public function store():void
    {
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_password']))
        {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password)
            {
                echo "Пароли не совпадают!";
                return;
            }

            $userModel = new User;
            $userModel->create($_POST);
        }
        header("Location: index.php?page=users");
    }
}