<?php
session_start();

if (!isset($_SESSION['user-agent']))
    $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
else {
    if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
        session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="Ejercicio6.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<style>
    .contenedor {

        width: 90%;
        margin-left: 3%;
    }

    .padre {
        margin: 0 0 20% 7%;
        width: 100%;
        padding: 5%;

    }

    .producto {
        background-image: url("imagenes6/fondo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        width: 20%;
        height: 400px;
        float: left;
        margin: 0 0 5% 6%;
        border: 1px solid #006CFF;
        padding: 0%;
    }

    .producto:hover {
        transform: scale(1.2);
        transition: all 0.4s linear;
    }

    .img {
        width: 75%;
        margin-left: 15%;
    }
</style>

<body>
    <div class="contenedor">
        <?php

        $_SESSION['listProducts'] = array(
            array("id" => "1", "nombre" => "Camiseta Azul CNP", "precio" => 14.95, "imagen" => "imagenes6/Productos/camisetaAzul.jpg", "cantidad" => 1),
            array("id" => "2", "nombre" => "Camiseta Oscura CNP", "precio" => 12.95, "imagen" => "imagenes6/Productos/camisetaOscura.jpg", "cantidad" => 1),
            array("id" => "3", "nombre" => "Agenda", "precio" => 8.50, "imagen" => "imagenes6/Productos/agenda.jpg", "cantidad" => 1),
            array("id" => "6", "nombre" => "Camiseta Azul Clara CNP", "precio" => 14.50, "imagen" => "imagenes6/Productos/llaveroGC.jpg", "cantidad" => 1),
            array("id" => "7", "nombre" => "Llavero CNP", "precio" => 6, "imagen" => "imagenes6/Productos/llavero.jpg", "cantidad" => 1),
            array("id" => "8", "nombre" => "Llavero Oscuro CNP", "precio" => 6, "imagen" => "imagenes6/Productos/llaveroOscuro.jpg", "cantidad" => 1),
            array("id" => "4", "nombre" => "Mascarilla Oscura CNP", "precio" => 7.95, "imagen" => "imagenes6/Productos/parcheCanina.jpg", "cantidad" => 1),
            array("id" => "5", "nombre" => "Mascarilla UIP CNP", "precio" => 14.95, "imagen" => "imagenes6/Productos/parcheIcaro.jpg", "cantidad" => 1),
            array("id" => "9", "nombre" => "Parche Oscuro CNP", "precio" => 5.95, "imagen" => "imagenes6/Productos/parcheOscuro.jpg", "cantidad" => 1),
            array("id" => "10", "nombre" => "Parche UPR", "precio" => 5.95, "imagen" => "imagenes6/Productos/parcheUPR.jpg", "cantidad" => 1),
            array("id" => "11", "nombre" => "Taza Z CNP", "precio" => 14.00, "imagen" => "imagenes6/Productos/parcheMini.jpg", "cantidad" => 1),
            array("id" => "12", "nombre" => "Taza UPR", "precio" => 12.00, "imagen" => "imagenes6/Productos/parcheUrgencias.jpg", "cantidad" => 1)
        );

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }


        function pintarProductos($productos)
        {
            echo "<h1 class= 'display-1' style = 'text-align: center; margin-top:5%'>Productos</h1><br>";
            echo "<div class='padre'>";
            foreach ($productos as $articulo) {
                echo "<div class='producto' >";
                echo '<img src="' . $articulo["imagen"] . '" class="img" style = "margin-top:5%; margin-left:13%" alt="...">';
                echo "<p style = 'padding:3%; text-align:center;' name ='nombre'>" . $articulo['nombre'] . "</p>";
                echo "<p style = ' text-align:center;'>" . $articulo['precio'] . "€</p>";
                echo "<form method='post'>";
                echo "<input type='submit' value='" . $articulo['id'] . "' name='añadir' class='btn btn-primary' style = 'margin-left:38%'>";
                echo "</form>";
       
                echo "</div>";
            }

            echo "</div>";
        }

        print_r($_SESSION['carrito']);
                if(isset($_POST['añadir'])){
                foreach ($_SESSION['listProducts'] as $producto) {
                    if ($producto['id'] == $_POST['añadir']) {
                        if(!in_array($producto, $_SESSION['carrito']))
                        array_push($_SESSION['carrito'], $producto);
                    }
                }
        
        }
        print_r($_SESSION['carrito']);
        ?>

        <header>
            <h1 style="text-align: center; " class="display-1">SerPolicia.es</h1>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link active" href="Ejercicio6.php" style="margin-left: 2%;">Inicio</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="Ejercicio6-Ruta091.php" style="margin-left: 2%;">Ruta 091</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="Ejercicio6-requisitos.php" style="margin-left: 2%;">Requisitos</a>
            </nav>
        </header>
        <section>
            <div style="margin-bottom: 6%; margin-left: 35%; position: absolute;">
                <a class="nav-link" href="carrito.php"><img src="imagenes6/carrito.png" alt="" style="width:4.2%; float:right; margin-right: 15%;"></a>
                <a class="nav-link" href="login.php"><img src="imagenes6/user.png" alt="" width="3%" style="margin-right: 3%; margin-bottom: 5%; margin-top: -1.2%; float:right;"></a>
            </div>
        </section>

        <section>


            <?php pintarProductos($_SESSION['listProducts']); ?>
        </section>

        <footer style="margin-top: 110%; background-color: #006CFF; color: white; width:100%">
            <p style="text-align: center; padding: 4%;">
                Copyright 2020 © serPolicia <br>
                Going Forward S.L. Todos los derechos reservados <br>
                Aviso Legal | Privacidad | Devoluciones y cancelaciones | Preguntas frecuentes <br>
            </p>
        </footer>
    </div>
</body>

</html>