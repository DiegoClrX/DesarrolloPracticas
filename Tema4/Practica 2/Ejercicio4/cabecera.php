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
        background-image: url("imagenes4/fondo.png");
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
            array("id" => "1", "nombre" => "Camiseta Azul CNP", "precio" => 14.95, "imagen" => "imagenes4/Productos/camisetaAzul.jpg", "cantidad" => 1),
            array("id" => "2", "nombre" => "Camiseta Oscura CNP", "precio" => 12.95, "imagen" => "imagenes4/Productos/camisetaOscura.jpg", "cantidad" => 1),
            array("id" => "3", "nombre" => "Agenda", "precio" => 8.50, "imagen" => "imagenes4/Productos/agenda.jpg", "cantidad" => 1),
            array("id" => "6", "nombre" => "Camiseta Azul Clara CNP", "precio" => 14.50, "imagen" => "imagenes4/Productos/llaveroGC.jpg", "cantidad" => 1),
            array("id" => "7", "nombre" => "Llavero CNP", "precio" => 6, "imagen" => "imagenes4/Productos/llavero.jpg", "cantidad" => 1),
            array("id" => "8", "nombre" => "Llavero Oscuro CNP", "precio" => 6, "imagen" => "imagenes4/Productos/llaveroOscuro.jpg", "cantidad" => 1),
            array("id" => "4", "nombre" => "Mascarilla Oscura CNP", "precio" => 7.95, "imagen" => "imagenes4/Productos/parcheCanina.jpg", "cantidad" => 1),
            array("id" => "5", "nombre" => "Mascarilla UIP CNP", "precio" => 14.95, "imagen" => "imagenes4/Productos/parcheIcaro.jpg", "cantidad" => 1),
            array("id" => "9", "nombre" => "Parche Oscuro CNP", "precio" => 5.95, "imagen" => "imagenes4/Productos/parcheOscuro.jpg", "cantidad" => 1),
            array("id" => "10", "nombre" => "Parche UPR", "precio" => 5.95, "imagen" => "imagenes4/Productos/parcheUPR.jpg", "cantidad" => 1),
            array("id" => "11", "nombre" => "Parche mini CNP", "precio" => 14.00, "imagen" => "imagenes4/Productos/parcheMini.jpg", "cantidad" => 1),
            array("id" => "12", "nombre" => "Parche Urgencias", "precio" => 12.00, "imagen" => "imagenes4/Productos/parcheUrgencias.jpg", "cantidad" => 1)
        );

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }


        function pintarProductos($productos)
        {
            echo "<h1 class= 'display-1' style = 'text-align: center; margin-top:5%'>Productos</h1><br>";
            echo "<div class='padre'>";
            foreach ($productos as $articulo) {
                echo "<form method='GET'>";
                echo "<div class='producto' >";
                echo '<img src="' . $articulo["imagen"] . '" class="img" style = "margin-top:5%; margin-left:13%" alt="...">';
                echo "<p style = 'padding:3%; text-align:center;' name ='nombre'>" . $articulo['nombre'] . "</p>";
                echo "<p style = ' text-align:center;'>" . $articulo['precio'] . "€</p>";
                echo "<a href='cabecera.php?añadir=".$articulo['id']."' style = 'margin-left:38%;'>";
                echo " <button type='button' class='btn btn-primary' name='añadir'>añadir</button>";
                echo "</a>";
                echo "</form>";

                echo "</div>";
            }
            echo "</div>";
        }
        if (isset($_GET['añadir'])) {
            foreach ($_SESSION['listProducts'] as $producto) {
                if ($producto['id'] == $_GET['añadir']) {
                    if (!in_array($producto, $_SESSION['carrito']))
                        array_push($_SESSION['carrito'], $producto);
                }
            }
        }
        
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
            <div style="margin-bottom: 6%; margin-left: 70%; margin-top:10%; position: absolute;">
                <a href="carrito.php">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg>
                </a>
            </div>
            <form action=""></form>
        </section>

        <section>


            <?php pintarProductos($_SESSION['listProducts']); ?>
        </section>

        <footer style="margin-top: 120%; background-color: #006CFF; color: white; width:100%">
            <p style="text-align: center; padding: 4%;">
                Copyright 2020 © serPolicia <br>
                Going Forward S.L. Todos los derechos reservados <br>
                Aviso Legal | Privacidad | Devoluciones y cancelaciones | Preguntas frecuentes <br>
            </p>
        </footer>
    </div>
</body>

</html>