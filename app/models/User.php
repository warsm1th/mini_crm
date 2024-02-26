<?php
namespace App\Models;
use App\Config\Database;

class User
{
    private object $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection;
    }

    public function readAll()
    {
        
    }
}