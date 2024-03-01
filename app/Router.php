<?php
namespace App;

use App\Controllers\Users\UsersController, App\Controllers\HomeController;


class Router
{
    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        switch ($page)
        {
            case '':
            case 'home':
                $controller = new HomeController;
                $controller->index();
                break;
            case 'users':
                $controller = new UsersController;
                if (isset($_GET['action']))
                {
                    switch ($_GET['action'])
                    {
                        case 'create':
                            $controller->create();
                            break;
                        case 'store':
                            $controller->store();
                            break;
                        case 'delete':
                            $controller->delete();
                            break;
                    }
                }
                else
                {
                    $controller->index();
                }
                break;
            default:
                http_response_code(404);
                echo "Страница не найдена!";
                break;
        }
    }
}