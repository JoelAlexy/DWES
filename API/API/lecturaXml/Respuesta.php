<?php
/**
 * Clase Respuesta: 
 * gestiona la creación y 
 * envío de respuestas JSON 
 */
class RespuestaServicio{
	public static function enviarRespuesta($codigo, $listaLibros)
	{
		header('Content-type: application/json');
		http_response_code($codigo);

		echo json_encode($listaLibros);
	}
}
?>
