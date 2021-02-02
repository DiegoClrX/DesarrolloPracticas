<?php

//Inicializacion de variables
if (!isset($_SESSION['contadorID'])) {
    $_SESSION['contadorID'] = 0;
}
if (!isset($_SESSION['tareas'])) {
    $_SESSION['tareas'] = array("id" => 1, "nombre" => "null", "descripcion" => "null", "date" => "null", "prioridad" => "rojo");
}
if (!isset($_SESSION['buscadorFecha'])) {
    $_SESSION['buscadorFecha'] = array();
}


        /*----------------------------------------------------------------------*/
        /*                              Metodos                                */
        /*--------------------------------------------------------------------*/


//Añade las tareas al archivo txt 
if (isset($_POST['nombreTarea'])) {
    leerArchivo("Diccionario.txt");
    for ($i = 0; $i < count(array_column($_SESSION['tareas'], 'id')); $i++) {
        $cont++;
    }
    $fp = fopen("task.txt", "a");
    fwrite($fp, "\n" . $cont . "#" . $_POST['nombreTarea'] . "#" . $_POST['descripcionTarea'] . "#" . $_POST['dateTarea'] . "#" . $_POST['prioridadTarea']);
    fclose($fp);
    header("location: cabecera.php");
}

//Borra la tarea seleccionada
if (isset($_GET['borrar'])) {
    $_SESSION['tareas'] = leerArchivo("task.txt");

    if (in_array($_GET['borrar'], array_column($_SESSION['tareas'], 'id'))) {
        //Buscamos la posicion del array donde está el id
        $pos = array_search($_GET['borrar'], array_column($_SESSION['tareas'], 'id'));
        //Eliminamos ese contacto del array
        unset($_SESSION['tareas'][$pos]);
        //Escribimos el array entero al archivo, sobrescribiéndolo
        $_SESSION['tareas'] = array_values($_SESSION['tareas']);
        escribirArchivo($_SESSION['tareas']);
        $_SESSION['tareas'] = leerArchivo("task.txt");
        header("location: cabecera.php");
    }
}


//Buscar tarea por fecha
if (isset($_POST['buscarTarea'])) {
    $_SESSION['tareas'] = leerArchivo('task.txt');
    foreach ($_SESSION['tareas'] as $tarea) {
        if ($tarea['fecha'] < $_POST['buscarTarea']) {
            array_push($_SESSION['buscadorFecha'], $tarea);
        }
    }
    //print_r($_SESSION['buscadorFecha']);
    header("location: buscarTarea.php");
    
}
//Cambiar la prioridad a 1 - 3 y despues ordenar con varios if
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ordenar') {
        $_SESSION['tareas'] = leerArchivo("task.txt");
        $_SESSION['tareas'] = sort($_SESSION['tareas']);
        header("location: cabecera.php");
    }
}






                                            /*----------------------------------------------------------------------*/
                                            /*                              FUNCIONES                              */
                                            /*--------------------------------------------------------------------*/

/*
//Esta funcion muestra las distintas tareas 
function mostrarTareas($array)
{
    foreach ($array as $elemento) {
        if (strtotime($elemento['fecha']) < time()) {
            echo "<div style='border: 1px solid black; width:40%; margin-left:30%;margin-bottom:3%; margin-top:5%; padding:3%'>";
            echo "<h3 style = 'text-decoration:line-through; '> Tarea: " . $elemento['nombre'] . "</h3>";
            echo "<p style = 'text-decoration:line-through'; >Descripcion: " . $elemento['descripcion'] . "<br> Fechas limite: " . $elemento['fecha'] . " Prioridad:";
            echo "<img src ='prioridad/" . $elemento['prioridad'] . ".png' alt='error' style = 'width:2%;' >";
            echo "<a href='controlador.php?borrar=" . $elemento['id'] . "'>";
?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="margin-left: 50%; margin-top: -7%;">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
        <?php
            echo "</a>";
            echo "</div>";
        } else {
            echo "<div style='border: 1px solid black; width:40%; margin-left:30%;margin-bottom:3%; padding:3%'>";
            echo "<h3> Tarea: " . $elemento['nombre'] . "</h3>";
            echo "<p>Descripcion: " . $elemento['descripcion'] . "<br> Fechas limite: " . $elemento['fecha'] . " Prioridad:";
            echo "<img src ='prioridad/" . $elemento['prioridad'] . ".png' alt='error' style = 'width:1.5%;' >";
            echo "<a href='controlador.php?borrar=" . $elemento['id'] . "'>";
        ?>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="margin-left: 90%; margin-top: -7%;">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg>
<?php echo "</a>";
            echo "</div>";
        }
    }
}


function leerArchivo($fichero)
{
    $palabras = array();
    //Leemos el archivo
    $datos = file_get_contents($fichero);

    //Nos creamos una array
    $datos = explode("\n", $datos);

    foreach ($datos as $valor) {
        //Recorriendo los datos del fichero hechos un array se lo añadimos a otro array bidimensional previamente haciendo un array por cada elemento
        $palabra = explode("#", $valor);
        $palabras[] = array("id" => $palabra[0], "nombre" => $palabra[1], "descripcion" => $palabra[2], "fecha" => $palabra[3], "prioridad" => $palabra[4]);
    }

    return $palabras;
}



function escribirArchivo($tareas)
{
    //Solo para que sea más eficiente y no abra y cierre el archivo cada vez que escribes
    $file = fopen("task.txt", "w+");
    if (flock($file, LOCK_EX)) {
        foreach ($tareas as $valor) {
            fwrite($file, $valor['id'] . "#" . $valor['nombre'] . "#" . $valor['descripcion'] . "#" . $valor['fecha'] . "#" . $valor['prioridad']."\n");
        }
    }
    fflush($file);
    flock($file, LOCK_UN);
    fclose($file);
}
*/
?>