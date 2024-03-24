<?php
namespace App\Controllers\Users;
use App\Models\User, App\Config\Validate;

class UsersController
{
    public function index(): void
    {
        $userModel = new User;
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }

    public function create(): void
    {
        include 'app/views/users/create.php';
    }

    public function store(array $data): void
    {
        $validate = new Validate($data);
        if ($validate->getResult())
        {
            $userModel = new User();
            $userModel->create($_POST);
        }
        header("Location: index.php?page=users");
    }

    public function delete(int $id): void
    {
        $userModel = new User;
        $userModel->delete($id);
        header("Location: index.php?page=users");
    }

    public function edit(int $id): void
    {
        $userModel = new User();
        $user = $userModel->read($id);

        include 'app/views/users/edit.php';
    }

    public function update(int $id, array $data): void
    {
        $userModel = new User();
        $userModel->update($id, $data);
        header("Location: index.php?page=users");
    }
}