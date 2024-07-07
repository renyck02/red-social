<?php

namespace Model;

class Miembros_grupo extends ActiveRecord {
    protected static $tabla = 'miembros_grupo';
    protected static $columnasDB = ['id', 'grupo_id', 'usuario_id'];

    public $id;
    public $grupo_id;
    public $usuario_id;





    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->grupo_id = $args['grupo_id'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? null ;
    }

    public static function obtenerElGrupoDelChat($usuarioId,$amigoId){
            // consulta
            $query = "SELECT grupo_id
FROM miembros_grupo
WHERE usuario_id IN (${usuarioId} ,${amigoId})
GROUP BY grupo_id
HAVING COUNT(*) = 2
AND COUNT(DISTINCT usuario_id) = 2"; 
            $resultado = self::consultarSQL($query);
            
            if ($resultado) {
                return array_shift( $resultado ) ;
            } else {
                return null;
            }
    }

    

}