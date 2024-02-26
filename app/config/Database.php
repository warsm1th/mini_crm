<?php
namespace App\Config;

class Database
{
    private static $instance = null;
    private object $conn;
    private string $user = "bebeg";
    private string $pass = "Memefrog_6277";
    private string $attr = "mysql:host=localhost;dbname=mini_crm_db";

    private function __construct()
    {
        try
        {
            $this->conn = new \PDO($this->attr, $this->user, $this->pass);
        }
        catch (\PDOException $exception)
        {
            die("Ошибка соединения: " . $exception->getMessage());
        }
    }
    //получение объекта класса
    public static function getInstance():object
    {
        if (!self::$instance)
        {
            self::$instance = new Database();
            return self::$instance;
        }
    }
    //получение соединения с БД
    public function getConnection():object
    {
        return $this->conn;
    }
}