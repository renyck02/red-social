<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class ApiController {
    public static function busquedaUsuarios(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("no funciona");
        }
        // busqueda de usuarios
        $usuarios = Usuario::busquedaUsuarios($_POST["busqueda"], $id);
        echo json_encode($usuarios);
    }
}