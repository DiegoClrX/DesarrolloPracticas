<?php
session_start();
//include_once("controlador.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Tarea</title>
</head>
<body>
<h5 style="text-align: center;" class="display-1">Añadir una nueva tarea</h5>
        <form method="POST" action="cabecera.php" style="margin-left: 35%; margin-top: 5%;">
            <input type="text" name="nombreTarea" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Nomrbe de la tarea" require>
            <input type="text" name="descripcionTarea" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Descripcion de la tarea" require>
            <input type="date" name="dateTarea" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Fecha de Expedicion" require>
            <select name="prioridadTarea" id="" class="custom-select custom-select-lg mb-3" style="width: 50%;">
                <option value="rojo">rojo</option>
                <option value="amarillo">amarillo</option>
                <option value="verde">verde</option>
            </select>
            <select name="categoriaTarea" id="" class="custom-select custom-select-lg mb-3" style="width: 50%;">
                <option value="uno">1</option>
                <option value="dos">2</option>
                <option value="tres">3</option>
            </select>
            <input type="submit" class="btn btn-primary" name="addtarea" value="Añadir" style="margin-left: -25%; position: absolute; margin-top: 5%;">
            <a href="cabecera.php" style="position: absolute; margin-left: -15%; margin-top: 5%;">
                <button type="button" class="btn btn-primary">Cancelar</button>
            </a>
        </form>

</body>
</html>