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
}