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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Gestor de Tareas</title>
</head>

<body>
    <div class="padre">

        <h1 class="display-3">Bienvenid@ a tu Gestor de Tareas</h1>

        <a href="Ejercicio5.php?action=add">
            <button type="button" class="btn btn-primary" style="margin-left: 10%;" name="add">Añadir Tarea</button>
        </a>

        <a href="Ejercicio5.php?action=del">
            <button type="button" class="btn btn-primary" name="del">Borrar todas las tareas</button>
        </a>

    </div>
</body>

</html>

<?php

if (!isset($_SESSION['listChores'])) {
    $_SESSION['listChores'] = array();
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add') {

?>
        <h5 style="margin:3% ;">Añadir una nueva tarea</h5>
        <form method="POST">
            <input type="text" name="nombre" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Nomrbe de la tarea" require>
            <input type="text" name="descripcion" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Descripcion de la tarea" require>
            <input type="date" name="date" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Fecha de Expedicion" require>
            <select name="prioridad" id="" class="custom-select custom-select-lg mb-3" style="width: 30%;">
                <option value="rojo">rojo</option>
                <option value="amarillo">amarillo</option>
                <option value="verde">verde</option>
            </select>
            <input type="submit" class="btn btn-primary" name="añadir" value="Añadir" style="margin-right: 80%;margin-top: 1%;">
        </form>

<?php
        //Añade al array los elementos seleccionados
        $elemento = array();
        if (isset($_POST['añadir'])) {
            if (isset($_POST['nombre'])) {
                $tarea = $_POST['nombre'];
                echo $tarea;
                array_push($elemento, $tarea);
            }
            if (isset($_POST['descripcion'])) {
                $tarea = $_POST['descripcion'];
                array_push($elemento, $tarea);
            }
            if (isset($_POST['date'])) {
                $tarea = $_POST['date'];
                array_push($elemento, $tarea);
            }
            if (isset($_POST['prioridad'])) {
                switch($_POST['prioridad']){
                    case 'rojo':
                        $tarea = "rojo.png";
                    break;
                    case 'amarillo':
                        $tarea = "amarillo.png";
                    break;
                    case 'verde':
                        $tarea = "verde.png";
                    break;

                }
                array_push($elemento, $tarea);
            }
            array_push($_SESSION['listChores'], $elemento);
        }
    }
}

if (isset($_GET['action'])) {
    if (($_GET['action'] == 'del')) {
        $long = count($_SESSION['listChores']);
        for ($i = 0; $i < $long + 1; $i++) {
            unset($_SESSION['listChores'][$i]);
        }
        
    }
}

function mostrarTareas($array){
    foreach($array as $elemento){
        if(strtotime($elemento[2])<time()){
            echo "<div style='border: 1px solid black; width:40%; margin-left:30%;margin-bottom:3%; padding:3%'>";
            echo "<h3 style = 'text-decoration:line-through; '> Tarea: ".$elemento[0]."</h3>";
            echo "<p style = 'text-decoration:line-through'; >Descripcion: ".$elemento[1]. "<br> Fechas limite: ".$elemento[2]." Prioridad:";
            echo "<img src ='imagenes5/prioridad/".$elemento[3]."' alt='error' style = 'width:1.5%;' >";
            echo "<a href='del_new.php?id=".$elemento[0]."'><i class='text-danger fa fa-trash' aria-hidden='true'></i></a>";
        echo "</div>";
        }else{
            echo "<div style='border: 1px solid black; width:40%; margin-left:30%;margin-bottom:3%; padding:3%'>";
            echo "<h3> Tarea: ".$elemento[0]."</h3>";
            echo "<p>Descripcion: ".$elemento[1]. "<br> Fechas limite: ".$elemento[2]." Prioridad:";
            echo "<img src ='imagenes5/prioridad/".$elemento[3]."' alt='error' style = 'width:1.5%;' >";
            echo "<a href='del_new.php?id=".$elemento[0]."'><i class='text-danger fa fa-trash' aria-hidden='true'></i></a>";
        echo "</div>";
        }
        
    }
}

mostrarTareas($_SESSION['listChores']);

?>

<div>
    <h1></h1>
    <div>
        <h3></h3>
    </div>

</div>

