<?php

namespace Model;

class Amigo extends ActiveRecord {
    protected static $tabla = 'amigos';
    protected static $columnasDB = ['id', 'usuarioId', 'usuarioAmigoId', 'estado'];

    public $id;
    public $usuarioId;
    public $usuarioAmigoId;
    public $estado;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args["usuarioId"] ?? null;
        $this->usuarioAmigoId = $args["usuarioAmigoId"] ?? null;
        $this->estado =  $args["estado"] ?? 0;
    }

        // Busqueda de notificaciones
        public static function notificaciones($columna, $valor) {
            // consulta
            $query = "SELECT amigos.id,usuarios.id as usuario_id, usuarios.nickname FROM " . static::$tabla . " JOIN usuarios ON amigos.usuarioId = usuarios.id WHERE ${columna} = '${valor}' AND estado = '0'";
            $resultado = self::$db->query($query); 
            if ($resultado) {
                $filas = $resultado->fetch_all(MYSQLI_ASSOC); // Obtener todas las filas como un array asociativo
                $resultado->free(); // Liberar la memoria del resultado
                return $filas;
            } else {
                return null;
            }
        }  
        // Busca un registro por sus ids
        public static function findRelacion($id,$amigoId) {
            $query = "SELECT * FROM " . static::$tabla  ." WHERE usuarioId = ${id} AND usuarioAmigoId = ${amigoId} OR usuarioId = ${amigoId} AND usuarioAmigoId = ${id}";
            $resultado = self::consultarSQL($query);
            return array_shift( $resultado ) ;
        }

}