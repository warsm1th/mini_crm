<?php
namespace App\Controllers\Users;
use App\Models\User, App\Config\Validate;

class UsersController
{
    public function index():void
    {
        $userModel = new User;
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }

    public function create():void
    {
        include 'app/views/users/create.php';
    }

    public function store():void
    {
        $validate = new Validate($_POST);
        if ($validate->getResult())
        {
            $userModel = new User;
            $userModel->create($_POST);
        }
        header("Location: index.php?page=users");
    }

    public function delete():void
    {
        $userModel = new User;
        $userModel->delete($_GET['id']);
        header("Location: index.php?page=users");
    }

    public function edit():void
    {
        $userModel = new User;
        $user = $userModel->read($_GET['id']);

        include 'app/views/users/edit.php';
    }

    public function update():void
    {
        $userModel = new User;
        $userModel->update($_GET['id'], $_POST);
        header("Location: index.php?page=users");
    }
}