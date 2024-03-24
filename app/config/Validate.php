<?php
namespace App\Config;

class Validate
{
    private bool $result = true;
    public function __construct(array $data)
    {
        if (isset($data['username']) && isset($data['email']) && isset($data['password']) && isset($data['confirm_password']))
        {
            $username = trim($data['username']);
            $email = trim($data['password']);
            $password = trim($data['password']);
            $confirm_password = trim($data['confirm_password']);

            if (empty($username) || empty($email) || empty($password) || empty($confirm_password))
            {
                $this->result = false;
                die('Необходимо заполнить все поля!');
            }

            if ($password !== $confirm_password)
            {
                $this->result = false;
                die('Пароли не совпадают!');
            }
        }
    }

    public function getResult(): bool
    {
        return $this->result;
    }
}