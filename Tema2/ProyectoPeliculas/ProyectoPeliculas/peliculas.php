<?php
//Libreria de peliculas

//Cabecera HTML
include_once("cabecera.php");
//Libreria con funciones sobre peliculas
include "libreria.php";

$peliculas = array(
    array("titulo" => "Reservoir Dogs", "director" => "Tarantino", "nota" => 8),
    array("titulo" => "Ciudadano Kane", "director" => "Wells", "nota" => 9),
    array("titulo" => "Apocalipse Now", "director" => "Coppola", "nota" => 9)
);

pintar($peliculas);
$resultado = nota_media($peliculas);
echo "<br>";
echo "<h3>Hay " . nota_media($peliculas)[1] . " peliculas y la media es " . $resultado[0] . "</h3>";

//include el pie HTML
include_once("pie.php");
