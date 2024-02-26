<?php
namespace App\Models;
use App\Config\Database;

class User
{
    private object $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function readAll():array
    {
        $result = $this->db->query('SELECT * FROM users');
        $users = [];
        while ($row = $result->fetch(\PDO::FETCH_LAZY))
        {
            $users[] = $row;
        }
        return $users;
    }
}