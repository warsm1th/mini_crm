<?php
namespace App\Config;

class Database
{
    private static $instance = null;
    private object $conn;

    private function __construct()
    {
        $config = require_once __DIR__ . '/../../config.php';

        $db_type = $config['db_type'];
        $db_user = $config['db_user'];
        $db_pass = $config['db_pass'];
        $db_host = $config['db_host'];
        $db_name = $config['db_name'];
        $db_charset = $config['db_charset'];
        
        try
        {
            $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=$db_charset";
            $this->conn = new \PDO($dsn, $db_user, $db_pass);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $exception)
        {
            die("Ошибка соединения: " . $exception->getMessage());
        }
    }
    //получение объекта класса
    public static function getInstance():object
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self();
            return self::$instance;
        }
    }
    //получение соединения с БД
    public function getConnection():object
    {
        return $this->conn;
    }
}