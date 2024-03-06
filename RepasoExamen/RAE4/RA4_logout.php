<?php
//iniciamos session
session_start();

//Vaciamos la variable de session 
session_unset();
// Eliminar la sesión
session_destroy();

// Eliminar la cookie
setcookie('recordar_contrasenia', '', time() - 3600, '/');

// Redirigir a RA4.php
header('Location: RA4.php');
exit;
?>
