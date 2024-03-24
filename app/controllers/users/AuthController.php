<?php
namespace App\Controllers\Users;
use App\Models\AuthUser, App\Models\User, App\Config\Validate;

class AuthController
{
    public function register(): void
    {
        include 'app/views/users/register.php';
    }

    public function store(array $data): void
    {
        $validate = new Validate($data);
        if ($validate->getResult())
        {
            $userModel = new User();
            $userModel->create($data);
        }
        header("Location: index.php?page=login");
    }

    public function login(): void
    {
        include 'app/views/users/login.php';
    }

    public function authenticate(array $data): void
    {
        $authModel = new AuthUser();
        if (isset($data['email']) && isset($data['password']))
        {
            $email = trim($data['email']);
            $password = trim($data['password']);
            $remember = isset($data['remember']) ? 'on' : '';

            $user = $authModel->findByEmail($email);

            if ($user && password_verify($password, $user['password']))
            {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];

                if ($remember)
                {
                    setcookie('user_email', $email, time() + 7 * 24 * 60 * 60, '/');
                    setcookie('user_password', $password, time() + 7 * 24 * 60 * 60, '/');
                }

                header("Location: index.php");
            }
            else
            {
                echo "Неверный логин/email!";
            }
        }
    }

    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}