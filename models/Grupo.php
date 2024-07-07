<?php

namespace Model;

class Grupo extends ActiveRecord {
    protected static $tabla = 'grupos';
    protected static $columnasDB = ['id', 'nombre', 'fecha_creacion'];

    public $id;
    public $nombre;
    public $fecha_creacion;




    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "chat";
        $this->fecha_creacion = $args['fecha_creacion'] ??date("Y-m-d") ;
    }

    

}