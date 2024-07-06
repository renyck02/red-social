<?php

namespace Model;

class Mensaje extends ActiveRecord {
    protected static $tabla = 'mensajes';
    protected static $columnasDB = ['mensajeId', 'grupoId', 'fecha', 'contenido','contenidoImagen'];

    public $mensajeId;
    public $grupoId;
    public $fecha;
    public $contenido;
    public $contenidoImagen;



    
    public function __construct($args = [])
    {
        $this->mensajeId = $args['mensajeId'] ?? null;
        $this->grupoId = $args['grupoId'] ?? null;
        $this->fecha = $args['fecha'] ??date("Y-m-d") ;
        $this->contenido = $args['contenido'] ?? "";
        $this->contenidoImagen = $args['contenido'] ?? "";


    }

    

}