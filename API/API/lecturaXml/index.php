<?php
include_once 'libro.php';
include_once 'Respuesta.php';

$libro = new Libro();

if (($_SERVER['REQUEST_METHOD'])) {
    $resultado = array('result' => 'ok','libros' => $libro->obtenerLibrosConFiltros($_GET)
    );
    RespuestaServicio::enviarRespuesta(200, $resultado);
}
