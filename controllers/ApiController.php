<?php

namespace Controllers;

use Classes\Email;
use Model\Amigo;
use Model\Usuario;
use MVC\Router;

class ApiController {
    public static function busquedaUsuarios(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // busqueda de usuarios
        $usuarios = Usuario::busquedaUsuarios($_POST["busqueda"], $id);
        echo json_encode($usuarios);
    }
    public static function agregaAmigo(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // verificar si no esta agregado
        $relacion = Amigo::findRelacion($id, $_POST["amigoId"]);
        if(!$relacion){
            $args = ["usuarioId"=> $id, "usuarioAmigoId" => $_POST["amigoId"]];
            $relacion= new Amigo($args);
            $relacion->guardar();
        }
        echo json_encode($relacion);
    }

    public static function relacion(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // verificar si no esta agregado
        $relacion = Amigo::findRelacion($id, $_POST["amigoId"]);
        if($relacion){
            echo json_encode($relacion);
            return;
        }
        echo json_encode("");
        
    }
}