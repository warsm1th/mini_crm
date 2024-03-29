<?php
namespace App\Models\Roles;
use App\Config\Database;

class Role
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
        try
        {
            $this->db->exec($createTableRoles);
            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function getAllRoles(): array | bool
    {
        $query = "SELECT * FROM roles";
        try
        {
            $stmt = $this->db->query($query);
            $roles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $roles ? $roles : false;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function getRole(int $id): array | bool
    {
        $query = "SELECT * FROM roles WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $role = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $role;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function createRole(string $role_name, string $role_description): bool
    {
        $query = "INSERT INTO roles(role_name, role_description) VALUES (:role_name, :role_description)";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('role_name', $role_name, \PDO::PARAM_STR);
            $stmt->bindParam('role_description', $role_description, \PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function updateRole(int $id, string $role_name, string $role_description): bool
    {
        
        $query = "UPDATE roles SET role_name = :role_name, role_description = :role_description WHERE id = :id";
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('role_name', $role_name, \PDO::PARAM_STR);
            $stmt->bindParam('role_description', $role_description, \PDO::PARAM_STR);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }

    public function deleteRole(int $id): bool
    {
        $query = "DELETE FROM roles WHERE id = :id";

        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id, \PDO::PARAM_INT);
            return true;
        }
        catch (\PDOException $e)
        {
            return false;
        }
    }
}