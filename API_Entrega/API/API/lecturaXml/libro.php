<?php
include_once('./DDBB.php');
include_once 'Respuesta.php';
/**generamos una clase libro para gestionar el retorno de libros */
class Libro extends Libreria
{
    /**
     * array con los filtros permitidos para su posterior uso para filtrar los libros segun la 
     * peticion realizada
    */
    private $filtrosPermitidos_get = array('id', 'autor', 'genero', 'pagina');

    /**
     *
     * @param array $filtros Array asociativo de la peticion get 
     * @return array Un array que coinciden con los criterios de filtrado.
     */
    public function obtenerLibrosConFiltros($filtros)
    {
        foreach ($filtros as $clave => $filtro) {
            if (!in_array($clave, $this->filtrosPermitidos_get)) {
                unset($filtros[$clave]);
                $respuesta = array(
                    'result' => 'error',

                );
                //hace llamada a una respuesta del servidor que informara al cliente de que hubo un error y devuelve el codigo 404
                RespuestaServicio::enviarRespuesta(400, $respuesta);
                exit;
            }
        }
        $datosLibros = parent::obtenerListaLibros($filtros);
        return $datosLibros;
    }
}


?>
