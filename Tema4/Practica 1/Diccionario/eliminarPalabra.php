<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Eliminar Palabra</title>
    
</head>
<body>
    <div style="margin-left: 0%; margin-top: 15%;">
        <h1 class="display-1" style="text-align: center;">📚 Eliminar Palabra 📚</h1>
        <h5 class="display-4" style="text-align: center;">Introduce la palabra que deseas eliminar</h5>
        <div style="margin-left: 15%;">
            <form action="Controlador.php" method="post">

                <input type="text" name="borradoEsp" class="form-control" placeholder="Introduce palabra Español" style="margin-bottom: 1%; margin-left:25%; width: 35%; margin-top: 3%;"><br>
                <input type="submit" class="btn btn-primary" style="margin-left: 45%;" value="Eliminar Palabra">

                <a href="cabecera.php">
                <button type="button" class="btn btn-primary" style="width: 10%; position: absolute; margin-left: -25%; margin-top: 0%;">Volver</button>
                </a>

            </form>
        </div>
    </div>
</body>
</html>