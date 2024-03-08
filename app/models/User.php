<?php
namespace App\Models;
use App\Config\Database;

class User
{
    private object $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        
        try
        {
            $table = $this->db->query("SELECT 1 FROM `users` LIMIT 1");
        }
        catch (\PDOException $exception)
        {
            $this->createTable();
        }
    }

    public function createTable(): bool
    {
        $query = file_get_contents(__DIR__ . "../../../table.sql");
        try
        {
            $this->db->exec($query);
            return true;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }

    public function readAll(): array | bool
    {
        try
        {
            $stmt = $this->db->query('SELECT * FROM users');
            $users = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
            {
                $users[] = $row;
            }
            return $users;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }

    public function create(array $data): bool
    {
        $login = $data['login'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $is_admin = isset($data['is_admin']) ? 1 : 0;
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO users(login, password, is_admin, created_at) VALUES (:login, :password, :is_admin, :created_at)";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('login', $login, \PDO::PARAM_STR);
            $stmt->bindParam('password', $password, \PDO::PARAM_STR);
            $stmt->bindParam('is_admin', $is_admin, \PDO::PARAM_INT);
            $stmt->bindParam('created_at', $created_at, \PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM users WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }

    public function read(int $id): array | bool
    {
        $query = "SELECT id, login, is_admin FROM users WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $user;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }

    public function update(int $id, array $data): bool
    {
        $login = $data['login'];
        $is_admin = isset($data['is_admin']) ? 1 : 0;
        $query = "UPDATE users SET login = :login, is_admin = :is_admin WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('login', $login, \PDO::PARAM_STR);
            $stmt->bindParam('is_admin', $is_admin, \PDO::PARAM_INT);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $exception)
        {
            return false;
        }
    }
}