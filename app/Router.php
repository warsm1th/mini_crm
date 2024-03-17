<?php
namespace App;

use App\Controllers\Users\UsersController, App\Controllers\HomeController, App\Controllers\AuthController;


class Router
{
    public function run(): void
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        switch ($page)
        {
            case '':
            case 'home':
                $controller = new HomeController();
                $controller->index();
                break;
            case 'users':
                $controller = new UsersController();
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
                            $controller->delete($_GET['id']);
                            break;
                        case 'edit':
                            $controller->edit($_GET['id']);
                            break;
                        case 'update':
                            $controller->update($_GET['id'], $_POST);
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