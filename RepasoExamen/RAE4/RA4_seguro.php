<?php
session_start();

if (isset($_SESSION['usuario'])) {

    // /recuperamos el nombre de usuario
    $usuario = $_SESSION['usuario']['usuario'];

    //recuperamos la cookie de la session
    $cookie_creada = $_SESSION['usuario']['cookie_creada'];
    echo '<h1 style="color:green;" >Bienvenido  ' . $usuario . ' </h1>';
    // al cerrar session redirigimo a RA4.php
    echo '<a href="RA4_logout.php">Cerrar sesión</a>';
} else {
    // Si no ha pasado por el login, mostrar mensaje de zona restringida y bloquear acceso
    echo '<h1 style="color:red;" >Zona restringida. Acceso bloqueado.</h1>';
}
