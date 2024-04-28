<?php
define('CARPETA__IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes-publicaciones/');
function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
