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
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
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
        $stmt->bindParam('login', $login, \PDO::PARAM_STR);
        $stmt->bindParam('password', $password, \PDO::PARAM_STR);
        $stmt->bindParam('is_admin', $is_admin, \PDO::PARAM_INT);
        $stmt->bindParam('created_at', $created_at, \PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }

    public function delete(int $id):bool
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam('id', $id, \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public function read(int $id):array
    {
        $stmt = $this->db->prepare("SELECT id, login, is_admin FROM users WHERE id = :id");
        $stmt->bindParam('id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function update(int $id, array $data):bool
    {
        $login = $data['login'];
        $is_admin = isset($data['is_admin']) ? 1 : 0;
        $stmt = $this->db->prepare("UPDATE users SET login = :login, is_admin = :is_admin WHERE id = :id");
        $stmt->bindParam('login', $login, \PDO::PARAM_STR);
        $stmt->bindParam('is_admin', $is_admin, \PDO::PARAM_INT);
        $stmt->bindParam('id', $id, \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
}