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

    public static function notificaciones(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // verificar si no esta agregado
        $notificaciones = Amigo::notificaciones("usuarioAmigoId", $id);
        if($notificaciones){
            echo json_encode($notificaciones);
            return;
        }
        echo json_encode([]);
    }

    public static function buscarNombre(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // verificar si no esta agregado
        $nickname = Usuario::buscarNickname("id", $_POST["id"]);
        if($nickname){
            echo json_encode($nickname);
            return;
        }
        echo json_encode("");
        
    }

    public static function agregar(){
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        // verificar si no esta agregado
        $relacion = Amigo::find($_POST["id"]);
        if($relacion){
            $relacion->estado = 1;
            $relacion->guardar();
            echo json_encode($relacion);
            return;
        }
        echo json_encode("");
        
    }
}