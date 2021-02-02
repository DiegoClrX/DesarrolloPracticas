<?php 
include_once("cabecera.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Buscar tarea</title>
</head>
<body>
<h5 style="text-align: center;" class="display-1">Buscar tarea por Fecha</h5>
        <form method="POST"style="margin-left: 35%; margin-top: 5%; margin-bottom: 10%;">
            <input type="date" name="buscarTarea" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Nomrbe de la tarea" require>
            <input type="submit" class="btn btn-primary" name="addtarea" value="Añadir" style="margin-left: 10%; position: absolute; margin-top: 1%;">
            <input type="submit" class="btn btn-primary" value="Volver" name="volver" style="position: absolute; margin-left: 17%; margin-top: 1%;">
        </form>
        <?php
        //Mostramos las tareas que hemos encontrado

        if (isset($_POST['buscarTarea'])) {
            $_SESSION['tareas'] = leerArchivo('task.txt');
            foreach ($_SESSION['tareas'] as $tarea) {
                if ($tarea['fecha'] < $_POST['buscarTarea']) {
                    array_push($_SESSION['buscadorFecha'], $tarea);
                }
            }
        }
        if (isset($_POST['volver'])) {
            $_SESSION['buscadorFecha'] = array();
            header("location: cabecera.php");
        }
        mostrarTareas($_SESSION['buscadorFecha']);
        ?>
</body>
</html>