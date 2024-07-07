<?php

namespace Controllers;

use Classes\Email;
use Model\Amigo;
use Model\Usuario;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Grupo;
use Model\Mensaje;
use Model\Miembros_grupo;
use Model\Publicacion;

class ApiControllerChat {
    public static function busquedaDegrupo(){ // se encargara de buscar el grupo del chat donde esten dos personas
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        $grupo = Miembros_grupo::obtenerElGrupoDelChat($id,$_POST["idAmigo"]); // se crea una instancia de miembros_grupo
        echo json_encode($grupo->grupo_id);
    }
    public static function crearChat(){ // se encarga de crear un grupo y añadir los usuarios a la tabla de miembros_grupo con el id del grupo
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        $grupo = new Grupo();
        $resultado = $grupo->guardar();
        $grupo->id = $resultado["id"];

        $usuarioMiembroChat = new Miembros_grupo(["usuario_id" => $id, "grupo_id" => $grupo->id]);
        $amigoMiembroChat = new Miembros_grupo(["usuario_id" => $_POST["idAmigo"], "grupo_id" => $grupo->id]);
        if($usuarioMiembroChat->guardar() && $amigoMiembroChat->guardar()){
            echo json_encode($grupo->id);
        } else{
            echo json_encode(null);
        }
        
    }
    public static function enviarMensaje(){ 
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }

        echo json_encode($mensaje);
        
    }
}