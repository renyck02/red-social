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

}