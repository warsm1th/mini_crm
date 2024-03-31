<?php
namespace App\Config;

class Database
{
    private static $instance = null;
    private object $conn;

    private function __construct()
    {
        $config = require_once __DIR__ . '/../../config.php';

        $db_user = $config['db_user'];
        $db_pass = $config['db_pass'];
        $db_host = $config['db_host'];
        $db_name = $config['db_name'];
        $db_charset = $config['db_charset'];
        
        try
        {
            $dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
            $this->conn = new \PDO($dsn, $db_user, $db_pass);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e)
        {
            die("Ошибка соединения: " . $e->getMessage());
        }
    }
    //получение объекта класса
    public static function getInstance(): Database
    {
        if (empty(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    //получение соединения с БД
    public function getConnection(): object
    {
        return $this->conn;
    }
}