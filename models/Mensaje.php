<?php

namespace Model;

class Mensaje extends ActiveRecord {
    protected static $tabla = 'mensajes';
    protected static $columnasDB = ['id', 'grupoId','usuario_id', 'fecha', 'contenido','contenidoImagen'];

    public $id;
    public $grupoId;
    public $usuario_id;
    public $fecha;
    public $contenido;
    public $contenidoImagen;



    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->grupoId = $args['grupoId'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->fecha = $args['fecha'] ??date("Y-m-d") ;
        $this->contenido = $args['contenido'] ?? "";
        $this->contenidoImagen = $args['contenidoImagen'] ?? "";


    }

    

}