<?php
include_once("lib/lib.php");

if (isset($_POST['add'])) {
    addTarea($_POST['nombre'], $_POST['descripcion'], $_POST['fecha'], $_POST['prioridad']);
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    exit(header("location: Ejercicio1.php"));
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'del') {
        delTodasTarea();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        header("location: Ejercicio1.php");
    }
}
if (isset($_GET['delTarea'])) {
    delTarea($_GET['delTarea']);
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    exit(header("location: Ejercicio1.php"));
}


?>