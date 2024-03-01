<?php
namespace App\Controllers;

class HomeController
{
    public function index():void
    {
        include 'app/views/index.php';
    }
}