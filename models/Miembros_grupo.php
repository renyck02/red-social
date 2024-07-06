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

    

}