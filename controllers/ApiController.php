<?php

namespace Controllers;

use Classes\Email;
use Model\Amigo;
use Model\Usuario;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Publicacion;

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

    public static function relacion(){ // funcion para checar si son o no amigos o si se han mandado solicitud o algo
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        
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
        // buscar en la tabla de amigos todas las solicitudes donde a el se las hayan mandado y el estado (relacion) sea 0 (no son amigos)
        $notificaciones = Amigo::notificaciones("usuarioAmigoId", $id);
        if($notificaciones){
            echo json_encode($notificaciones);
            return;
        }
        echo json_encode([]);
    }


    public static function agregar(){ // api de amigos
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

    public static function publicar(){ // api para crear publicaciones
        session_start();
        $id = $_SESSION["id"] ?? null;
        if(!$id){
            echo json_encode("Inicia sesion");
            return;
        }
        $alertas = [];
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; // crea un nombre unico para la imagen
        $publicacion = new Publicacion($_POST);
        $alertas = $publicacion->validarPublicacion(); 
        if(!$alertas){ // si alertas esta vacio ejecuta todo porque no hay error
            if(!is_dir(CARPETA__IMAGENES)) { // verifica si esta creada la carpeta, en caso de que no la crea para que pueda guardar las imagenes
            mkdir(CARPETA__IMAGENES);
            }        
            if($_FILES["imagen"]['tmp_name']) { // si hay una imagen ejecuta todo este codigo
                $publicacion->imagen = $nombreImagen; 
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600); // crea el objeto de imagen y lo modifica para que sea de 800px y 600px sin perder calidad gracias a Intervention Image
                $image->save(CARPETA__IMAGENES . $nombreImagen);  // Guarda la imagen en la ruta asignada
            }
            $publicacion->usuarioId = $id;
            $resultado = $publicacion->guardar(); // guarda la publicacion
            if($resultado){
                echo json_encode("se guardo"); 
                return; 
            } 
        }
        echo json_encode("no se guardo");  
    }
}