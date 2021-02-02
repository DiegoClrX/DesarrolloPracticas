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

        <header>

            <h1 style="text-align: center;" class="display-1">SerPolicia.es</h1>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link" href="Ejercicio6.php" style="margin-left: 2%;">Inicio</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="Ejercicio6-Ruta091.php" style="margin-left: 2%;">Ruta 091</a>
                <a class="flex-sm-fill text-sm-center nav-link active" href="Ejercicio6-requisitos.php" style="margin-left: 2%;">Requisitos</a>
            </nav>

        </header>

        <section>
            <div style="margin-bottom: 6%; margin-left: 35%; position: absolute;">
                <a class="nav-link" href="carrito.php"><img src="imagenes6/carrito.png" alt="" style="width:4.2%; float:right; margin-right: 15%;"></a>
                <a class="nav-link" href="login.php"><img src="imagenes6/user.png" alt="" width="3%" style="margin-right: 3%; margin-bottom: 5%; margin-top: -1.2%; float:right;"></a>
            </div>
        </section>

        <section>
            <h1>Requisitos</h1>
            <p>Tener la nacionalidad española. <br>

                Tener cumplidos 18 años de edad y no exceder de la edad máxima de jubilación.<br>

                No haber sido condenado por delito doloso, ni separado del servicio del Estado, de la Administración Autonómica, Local o Institucional, ni hallarse inhabilitado para el ejercicio de funciones públicas.<br>

                No hallarse incluido en ninguna de las causas de exclusión física o psíquica que impidan o menoscaben la capacidad funcional u operativa necesaria para el desempeño de las tareas propias de la Policía Nacional que vienen establecidas en el Anexo III de esta convocatoria.<br>

                Compromiso de portar armas y, en su caso, llegar a utilizarlas, que se prestará a través de declaración del solicitante.<br>

                Tener una estatura mínima de 1,65 metros los hombres y 1,60 las mujeres.<br>

                Estar en posesión del permiso de conducción de la clase B.<br>
            </p>
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