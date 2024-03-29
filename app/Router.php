<?php
namespace App;

use App\Controllers\HomeController, App\Controllers\Users\AuthController, App\Controllers\Users\UsersController;


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
                            $controller->store($_POST);
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
            case 'register':
                $controller = new AuthController();
                $controller->register();
                break;
            case 'login':
                $controller = new AuthController();
                $controller->login();
                break;
            case 'authenticate':
                $controller = new AuthController();
                $controller->authenticate($_POST);
                break;
            case 'logout':
                $controller = new AuthController();
                $controller->logout();
                break;
            case 'auth':
                $controller = new AuthController();
                if (isset($_GET['action']))
                {
                    switch ($_GET['action'])
                    {
                        case 'store':
                            $controller->store($_POST);
                            break;
                        case 'authenticate':
                            $controller->authenticate($_POST);
                            break;
                    }
                }
                else
                {
                    $controller->login();
                }
                break;
            default:
                http_response_code(404);
                echo "Страница не найдена!";
                break;
        }
    }
}