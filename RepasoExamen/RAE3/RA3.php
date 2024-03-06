<?php
function getDescripcion($num)
{

    $descripciones = array(0 => "Artículo 1", 1 => "Artículo 2", 2 => "Artículo 3", 3 => "Artículo 4", 4 => "Artículo 5");
    return $descripciones[$num];
};
function getPrecios($num)
{

    $arrPrize = array(0 => 100, 1 => 200, 2 => 300, 3 => 400, 4 => 500);
    return $arrPrize[$num];
};

if (isset($_POST['enviar'])) {
    if (isset($_POST['art'])) {
        $compra = array();
        $total = 0;
        foreach ($_POST['art'] as $key => $value) {
            array_push($compra, getDescripcion($key));
            $total += getPrecios($key);
        }
    } else {
        $mensaje = "El carrito est avacio, añade algun articulo";
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ejercicio RA3</title>
</head>

<body>
    <?php
    if (isset($compra)) { ?>
        <ul><?php
            foreach ($compra as $key => $value) {
            ?> <li> <?php echo $value; ?></li>
            <?php   } ?>
        </ul>

        <h1 style="color:blue"> Total:<?php echo $total; ?> </h1>
        <?php } else {
        if (isset($mensaje)) {
        ?><h1 style="color:red">
            <?php
            echo $mensaje;
        } ?>
            </h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <p>Tienda online</p>
                <input type="checkbox" id="art1" name="art[0]"><label for="art1"> Articulo 1. Precio: 100</label><br>
                <input type="checkbox" id="art2" name="art[1]"><label for="art2"> Articulo 2. Precio: 200</label><br>
                <input type="checkbox" id="art3" name="art[2]"><label for="art3"> Articulo 3. Precio: 300</label><br>
                <input type="checkbox" id="art4" name="art[3]"><label for="art4"> Articulo 4. Precio: 400</label><br>
                <input type="checkbox" id="art5" name="art[4]"><label for="art5"> Articulo 5. Precio: 500</label><br>
                <input type="submit" id="enviar" name="enviar" value="Realizar compra">
            </form>
        <?php } ?>
</body>

</html>