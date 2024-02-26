<?php
namespace App;

use App\Controllers\Users\UsersController;


class Router
{
    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        switch ($page)
        {
            case 'users':
                $controller = new UsersController;
                $controller->index();
                break;
            default:
                http_response_code(404);
                echo "Страница не найдена!";
                break;
        }
    }
}