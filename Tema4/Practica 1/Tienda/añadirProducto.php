<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir </title>
</head>
<body>
<h5 style="text-align: center;" class="display-1">Añadir una nueva </h5>
        <form method="POST" action="cabecera.php" enctype="multipart/form-data" style="margin-left: 35%; margin-top: 5%;">
            <input type="text" name="nombre" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Nomrbe del producto" require>
            <input type="text" name="precio" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Precio" require>
            <input type="text" name="descripcion" class="form-control" style="width: 50%; margin-bottom:2%;" placeholder="Descripcion del producto" require>
            <input type="file" class="form-control form-control-sm" name="imagen">
            <input type="submit" class="btn btn-primary" name="add" value="Añadir" style="margin-left: -15%; position: absolute; margin-top: 5%;">
            <a href="cabecera.php" style="position: absolute; margin-left: 0%; margin-top: 5%;">
                <button type="button" class="btn btn-primary">Cancelar</button>
            </a>
        </form>

</body>