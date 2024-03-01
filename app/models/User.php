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
        $stmt = $this->db->query('SELECT * FROM users');
        $users = [];
        while ($row = $stmt->fetch(\PDO::FETCH_BOTH))
        {
            $users[] = $row;
        }
        return $users;
    }

    public function create(array $data):bool
    {
        $login = $data['login'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $is_admin = isset($data['is_admin']) ? 1 : 0;
        $created_at = date('Y-m-d H:i:s');

        $stmt = $this->db->prepare("INSERT INTO users(login, password, is_admin, created_at) VALUES (:login, :password, :is_admin, :created_at)");
        return $stmt->execute(['login'=>"$login", 'password'=>"$password", 'is_admin'=>"$is_admin", 'created_at'=>"$created_at"]) ? true : false;
    }

    public function delete($id):bool
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(["id"=>"$id"]) ? true : false;
    }
}