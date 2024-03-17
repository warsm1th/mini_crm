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
        catch (\PDOException $e)
        {
            $this->createTable();
        }
    }

    public function createTable(): bool
    {
        $createTableRoles = file_get_contents(__DIR__ . "../../../roles.sql");
        $createTableUsers = file_get_contents(__DIR__ . "../../../users.sql");
        try
        {
            $this->db->exec($createTableRoles);
            $this->db->exec($createTableUsers);
            return true;
        }
        catch (\PDOException $e)
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
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function create(array $data): bool
    {
        $username = $data['username'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO users(username, email, password, created_at) VALUES (:username, :email, :password, :created_at)";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('username', $username, \PDO::PARAM_STR);
            $stmt->bindParam('email', $email, \PDO::PARAM_STR);
            $stmt->bindParam('password', $password, \PDO::PARAM_STR);
            $stmt->bindParam('created_at', $created_at, \PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $e)
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
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function read(int $id): array | bool
    {
        $query = "SELECT * FROM users WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $user;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function update(int $id, array $data): bool
    {
        $username = $data['username'];
        $email = $data['email'];
        $email_verification = isset($data['email_verification']) ? 1 : 0;
        $role = $data['role'];
        $query = "UPDATE users SET username = :username, email = :email, email_verification = :email_verification, role = :role WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('username', $username, \PDO::PARAM_STR);
            $stmt->bindParam('email', $email, \PDO::PARAM_STR);
            $stmt->bindParam('email_verification', $email_verification, \PDO::PARAM_INT);
            $stmt->bindParam('role', $role, \PDO::PARAM_INT);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }
}