<?php
session_start();
if (isset($_POST['enviar'])) {
    if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
    } else {
        $errUsuario = true;
    }

    if (isset($_POST['contrasenia']) && !empty($_POST['contrasenia'])) {
        $contrasenia = $_POST['contrasenia'];
    } else {
        $errContrasenia = true;
    }

    if (isset($_POST['cookie']) && !empty($_POST['cookie'])) {
        $cookie = $_POST['cookie'];
    } else {
        $errCookie = true;
    }

    if (($usuario === 'alumno') && ($contrasenia = 'alumno')) {
        if (isset($cookie)) {
            setcookie('recordar_contrasenia', 'si', 1000 + 3600, '/');
        }
        $datos_usuario = ['usuario' => $usuario, 'cookie_creada' => isset($_POST['cookie'])];

        // Guardar en la sesión
        $_SESSION['usuario'] = $datos_usuario;

        // Redirigir a RA4-seguro.php
        header('Location: RA4_seguro.php');
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ejercicio RA4</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <fieldset>
            <legend>Login</legend>
            <?php if (isset($errUsuario)) { ?>
                <h3 style="color:red;">
                    Usuario incorrecto</h3>
            <?php  } ?>
            <label for="usuario">Usuario: </label>
            <input type="text" id="usuario" name="usuario"><br>
            <?php if (isset($errContrasenia)) { ?>
                <h3 style="color:red;">
                    Contraseña incorrecto</h3>
            <?php  } ?>
            <label for="contrasenia">Contraseña: </label>
            <input type="password" id="contrasenia" name="contrasenia"><br>
            <input type="checkbox" id="cookie" name="cookie">
            <label for="cookie"> Recordar contraseña</label><br>
            <input type="submit" id="enviar" name="enviar" value="Iniciar sesión">
        </fieldset>
    </form>
</body>

</html>