<?php
session_start();

if (!isset($_SESSION['user-agent']))
    $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
else {
    if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
        session_destroy();
}
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Carrito</title>
</head>

<body>
    <h1 class="display-1">Carrito</h1>
    <?php
    function pintarCarrito($carrito)
    {
        $cont = 0;
        echo "<table  class='table'>";
        echo "<thead class = 'thead-dark'>";
        echo "<th scope='col'>id</th>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Producto</th>";
        echo "<th scope='col'>Precio</th>";
        echo "</thead>";
        //Recorrer el carrito
        echo "<tbody>";
        foreach ($carrito as $articulo) {
            echo "<tr>";
            echo "<th scope='row'>" . $articulo['id'] . "</th>";
            echo "<td>" . $articulo['nombre'] . "</td>";
            echo "<td> <a href='carrito.php'" . $articulo['cantidad'] . "</td>";
            echo "<td>" . $articulo['precio'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    //Pintar carrito
    pintarCarrito($_SESSION['carrito']);

    if (isset($_GET['action'])) {
        if (($_GET['action'] == 'del')) {
            $long = count($_SESSION['carrito']);
            for ($i = 0; $i < $long + 1; $i++) {
                unset($_SESSION['carrito'][$i]);
            }
        }
    }
    ?>
    <a href="Ejercicio6.php">
        <button class="btn btn-primary">Volver</button>
    </a>

    <a href="carrito.php?action=del">
        <button type="button" class="btn btn-primary" name="del">Borrar todo</button>
    </a>

    <a href="Ejercicio6.php" >
        <button type="button" class="btn btn-primary">Comprar</button>
    </a>



</body>

</html>