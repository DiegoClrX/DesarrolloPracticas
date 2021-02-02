<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 1</title>
</head>

<?php

//Simplemente lo que hace es coger el nombre del equipo que le has pasado y devolver la imagen
if($_POST){
$equipo = $_POST['equipos'];
            echo "<img src='img1/$equipo.jpg' alt'error' style = 'width: 30% ; margin-left: 35%; margin-top: 10%;'>";
        
}

?>

<body>
    <form action="" method="post">
        <div class="form-group"></div>
            <select name="equipos" class="custom-select custom-select-lg mb-3" style="width: 30%; margin-left: 35%; margin-top: 5%;">
                <option value="madrid">Madrid
                <option value="betis">Betis
                <option value="barcelona">Barcelona
                <option value="sevilla">Sevilla
                <option value="atleticoMadrid">Atletico Madrid
                <option value="almeria">Almeria
            </select>
            <br><input type="submit" value="Enviar" class="btn btn-primary" style="margin-left: 35%;">
        </div>
    </form>
</body>

</html>
