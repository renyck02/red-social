<?php
namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router){
        session_start();
        
        $router->render("dashboard/index", [

        ]);
    }

    public static function chats(Router $router){
        session_start();
        
        $router->render("dashboard/chats", [

        ]);
    }
}