<?php
const  hostname = 'localhost';
const username = 'alumno';
const password = 1234;
const database = 'Clase';


function conectar(): mysqli
{
    try {
        return mysqli_connect(hostname, username, password, database);
    } catch (Error $th) {
        $th = 'coneccion fallida';
    }
}
function desconectar($coneccion)
{
    try {
        return  mysqli_close($coneccion);
    } catch (Error $th) {
        $th = 'fallo al desconectarse de la base de datos';
    }
}

function getAllUsers($tabla)
{
    try{
    $coneccion = conectar();

    $consulta='SELECT * FROM '.$tabla;

   if($resultado=mysqli_query($coneccion,$consulta)){
    $result = mysqli_fetch_assoc($resultado);
   }

return $result;

}catch(error $mensaje){
    $mensaje='no se pudo acceder a la base de datos';
}
}

function getCampo($tabla,$campo,$condicion)
{
    try{
    $coneccion = conectar();

    $consulta='SELECT'.$campo.'FROM'.$tabla .'WHERE'.$campo.'='.$condicion ;

   if($resultado=mysqli_query($coneccion,$consulta)){
    $result = mysqli_fetch_assoc($resultado);
   }

return $result;

}catch(error $mensaje){
    $mensaje='no se pudo acceder a la base de datos';
}
}

function insertarUsuario(){

    try{
    $coneccion = conectar();

    $consulta='INSERT INTO usuarios nombre,apellido,contrasenha,tipo VALUES '."JOEL".' ';

    $resultado=mysqli_query($coneccion,$consulta);
//falta controlar el array hacerlo asociativo 
    echo var_dump($resultado);

}catch(error $mensaje){
    $mensaje='no se pudo acceder a la base de datos';
}
}
