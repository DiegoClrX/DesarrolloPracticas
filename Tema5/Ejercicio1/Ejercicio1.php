<?php
    include_once("lib/lib.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Gestor de Tareas</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <div class="padre">

        <h1 class="display-3" style="text-align: center; margin-bottom: 5%;">Bienvenid@ a tu Gestor de Tareas</h1>

        <a href="#">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTarea" data-whatever="@getbootstrap" style="margin-left: 40%;" name="add">Añadir Tarea</button>
        </a>

        <a href="controlador.php?action=del">
            <button type="button" class="btn btn-primary">Borrar todas las tareas</button>
        </a>

    </div>
</body>

</html>

<!-- MODAL AÑADIR TAREA-->
<div class="modal fade" id="addTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Tarea</h5>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="controlador.php">
            <input type="text" name="nombre" class="form-control" style=" margin-bottom:2%;" placeholder="Nomrbe de la tarea" require>
            <input type="text" name="descripcion" class="form-control" style=" margin-bottom:2%;" placeholder="Descripcion de la tarea" require>
            <input type="date" name="fecha" class="form-control" style=" margin-bottom:2%;" placeholder="Fecha de Expedicion" require>
            <select name="prioridad" id="" class="custom-select custom-select-lg mb-3">
                <option value="rojo">rojo</option>
                <option value="amarillo">amarillo</option>
                <option value="verde">verde</option>
            </select>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Close</button>
        </div>
    </form>
    </div>
  </div>
</div>
       

<?php

function mostrarTareas($array){
        echo "<table class = 'table' style = 'margin-top:5%; margin-left:20%; width:60%'>";
        echo "<thead class = 'thead-dark' style='margin-left:500%'>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Descripcion</th>";
        echo "<th scope='col'>Fecha</th>";
        echo "<th scope='col'>Prioridad</th>";
        echo "</thead>";
        echo "<tbody>";
    foreach($array as $elemento){
        echo "<tr>";
        if(strtotime($elemento['fecha'])<time()){
            echo "<td>".$elemento['nombre']."</td>";
            echo "<td>".$elemento['descripcion']."</td>";
            echo "<td>".$elemento['fecha']."</td>";
            echo "<td> <img src ='prioridad/".$elemento['prioridad'].".png' alt='error' style = 'width:1.5%; position:absolute'>";
            echo "<a href='controlador.php?delTarea=".$elemento['id']."'><i class='text-danger fa fa-trash' aria-hidden='true' style='margin-left: 100px'></i>";
            ?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        <?php
            echo "</a>";
            echo "</td>";
        }else{
            echo "<td>".$elemento['nombre']."</td>";
            echo "<td>".$elemento['descripcion']."</td>";
            echo "<td>".$elemento['fecha']."</td>";
            echo "<td> <img src ='prioridad/".$elemento['prioridad'].".png' alt='error' style = 'width:1.5%; position:absolute'>";
            echo "<a href='controlador.php?delTarea=".$elemento['id']."'><i class='text-danger fa fa-trash' aria-hidden='true' style='margin-left: 100px'></i>";
            ?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        <?php
            echo "</a>";
            echo "</td>";
        }
        echo "</tr>";

    }
    echo "</tbdody>";
    
    echo "</table>";
}

$tareas = devuelveTareas();
mostrarTareas($tareas);


?>
    

