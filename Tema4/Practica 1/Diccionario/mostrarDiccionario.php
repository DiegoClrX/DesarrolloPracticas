<?php
    session_start(); 
    include_once("controlador.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Mostrar Diccionario</title>
</head>
<body>
    <h1 class="display-1" style="text-align: center;">📚 Diccionario 📚</h1>
    <div style="margin-left: 35%; margin-top: 5%;">
            <a href="cabecera.php">
                <button type="button" class="btn btn-primary" style="width: 10%; height: 70px; position: absolute; font-size: 25px; margin-left: -28%; margin-top: 5%;">< Volver</button>
            </a>
    <table class="table" style="width: 30%; margin-left: 3%; margin-top: 3%;">
    <thead class="thead-dark">
        <tr>
        <th scope="col" style="background-color: #0180FF; border-color: #0180FF;">Español</th>
        <th scope="col" style="background-color: #0180FF; border-color: #0180FF;">Ingles</th>
        </tr>
    </thead>
    <tbody>
    <?php
    //Recorre en orden alfabetico el Diccionario   
    $_SESSION['diccionario'] = leerArchivo("Diccionario.txt");
    sort($_SESSION['diccionario']);
    foreach($_SESSION['diccionario'] as $palabra){
        echo "<tr>";
        echo "<td>".$palabra['espanol']."</td>";
        echo "<td>".$palabra['ingles']."</td>";
        echo "</tr>";
        
    }
    ?>
  </tbody>
</table>
    </div>

</body>
</html>