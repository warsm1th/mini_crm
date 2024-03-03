<?php
namespace App\Config;

class Validate
{
    private bool $result= true;
    public function __construct(array $data)
    {
        if (isset($data['login']) && isset($data['password']) && isset($data['confirm_password']))
        {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password)
            {
                $this->result = false;
                die('Пароли не совпадают!');
            }
        }
    }

    public function getResult():bool
    {
        return $this->result;
    }
}