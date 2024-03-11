<?php
class Libreria
{
    /**
     * Lee los datos del archivo XML y los convierte en un arreglo de libros.
     *
     * @return array Un array de libros, donde cada libro es un array asociativo.
     */


    private function cargarDatosDesdeXML()
    {
        $archivoXML = '../xml/books.xml';
        $datosXML = simplexml_load_file($archivoXML);
        $coleccionLibros = [];

        foreach ($datosXML->book as $libro) {
            $coleccionLibros[] = [
                'id' => (string)$libro['id'],
                'autor' => (string)$libro->author,
                'titulo' => (string)$libro->title,
                'genero' => (string)$libro->genre,
                'precio' => (int)$libro->price,
                'publicacion' => (int)$libro->publish_date,
                'descripcion' => (string)$libro->description
            ];
        }
        return $coleccionLibros;
    }

    /**
     *
     * @param array $filtros es un array asociativo con los filtros de búsqueda incluye pagina .
     * @return array Una matriz de libros con los libros que cumplen el filtrado.
     */
    public function obtenerListaLibros($filtros = [])
    {
        $coleccionLibros = $this->cargarDatosDesdeXML();
        if (!is_array($filtros)) {
            return $coleccionLibros;
        } else {
            foreach ($filtros as $campo => $valor) {
                if ($campo !== 'pagina') {
                    $coleccionLibros = array_filter($coleccionLibros, function ($libro) use ($campo, $valor) {
                        return stripos($libro[$campo], $valor)===0;
                    });
                } elseif (isset($filtros['pagina'])) {
                    $pagina = (int)$filtros['pagina'];
                    $librosPaginados = array_slice($coleccionLibros, 0, $pagina);
                    $coleccionLibros = $librosPaginados;
                }
            }

            return array_values($coleccionLibros);
        }
    }
}
