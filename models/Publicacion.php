<?php

namespace Model;

class Publicacion extends ActiveRecord {
    protected static $tabla = 'publicacion';
    protected static $columnasDB = ['id', 'usuarioId', 'mensaje', 'imagen','tageoUsuario','nivelPrivacidad'];

    public $id;
    public $usuarioId;
    public $mensaje;
    public $imagen;
    public $tageoUsuario;
    public $nivelPrivacidad;


    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->tageoUsuario = $args['tageoUsuario'] ?? '';
        $this->nivelPrivacidad = $args['nivelPrivacidad'] ?? 2;

    }

    public function validarPublicacion() {
        if(!$this->mensaje) {
            self::$alertas['error'][] = 'El Mensaje es obligatorio';
        }
        if(strlen($this->mensaje) < 6) {
            self::$alertas['error'][] = 'El mensaje debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Busqueda Where con Columna ${id}
    public static function buscarPublicaciones($id) {
        $query = "SELECT p.id, p.usuarioId, u.nickname, p.mensaje, p.imagen, p.tageousuario, p.nivelprivacidad
        FROM publicacion p
        INNER JOIN usuarios u ON p.usuarioid = u.id
        LEFT JOIN amigos a1 ON p.usuarioid = a1.usuarioid AND a1.usuarioAmigoId = ${id}
        LEFT JOIN amigos a2 ON p.usuarioid = a2.usuarioAmigoId AND a2.usuarioid = ${id}
        WHERE (p.nivelprivacidad = 2 OR (p.nivelprivacidad = 1 AND (a1.estado = 1 OR a2.estado = 1)))
        ORDER BY p.id DESC;";
        $resultado = self::$db->query($query); 
        if ($resultado) {
            $filas = $resultado->fetch_all(MYSQLI_ASSOC); // Obtener todas las filas como un array asociativo
            $resultado->free(); // Liberar la memoria del resultado
            return $filas;
        } else {
            return null;
        }
    }

}