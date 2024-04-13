<?php

namespace Model;

class Amigo extends ActiveRecord {
    protected static $tabla = 'amigos';
    protected static $columnasDB = ['id', 'nombre', 'nickname', 'email','fecha_de_nacimiento','numero', 'password',  'token','confirmado','fechaCreacion', 'admin'];

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