<?php

namespace App\Controllers\Roles;
use App\Models\Roles\Role;

class RoleController
{
    public function index(): void
    {
        $roleModel = new Role;
        $roles = $roleModel->getAllRoles();

        include 'app/views/roles/index.php';
    }

    public function create(): void
    {
        include 'app/views/roles/create.php';
    }

    public function store(array $data): void
    {
        if (isset($data['role_name']) && isset($data['role_description']))
        {
            $role_name = trim($data['role_name']);
            $role_description = trim($data['role_description']);
            
            if (empty($role_name))
            {
                echo 'Необходимо указать имя роли!';
                return;
            }

            $roleModel = new Role();
            $roleModel->createRole($role_name, $role_description);
        }
        header("Location: index.php?page=roles");
    }

    public function edit(int $id): void
    {
        $roleModel = new Role();
        $role = $roleModel->getRole($id);

        if (!$role)
        {
            echo 'Роль не найдена';
            return;
        }

        include 'app/views/roles/edit.php';
    }

    public function update(array $data): void
    {
        if (isset($data['id']) && isset($data['role_name']) && isset($data['role_description']))
        {
            $id = trim($data['id']);
            $role_name = trim($data['role_name']);
            $role_description = trim($data['role_description']);

            if (!$role_name)
            {
                echo 'Не указано имя роли!';
                return;
            }
            $userModel = new Role();
            $userModel->updateRole($id, $role_name, $role_description);
        }
        header("Location: index.php?page=roles");
    }

    public function delete(array $data): void
    {
        $roleModel = new Role();
        $roleModel->deleteRole($data['id']);

        header("Location: index.php?page=roles");

    }
}