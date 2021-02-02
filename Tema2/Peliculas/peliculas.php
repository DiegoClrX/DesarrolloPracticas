<?php

include("libreria.php");

$peliculas = array(
    array("titulo" => "Reservoir Dogs", "Director" => "Tarantino", "nota" => 8),
    array("titulo" => "Piratas del Caribe", "Director" => "Diego", "nota" => 9),
    array("titulo" => "Fast Furious", "Director" => "Angel", "nota" => 10)
);

pintar($peliculas);
media($peliculas);

?>