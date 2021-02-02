<?php

//Libreria para usar una aplicacion de peliculas

//function para pintar un array de peliculas
function pintar($peliculas){
    echo "<table class='table'>";
    foreach($peliculas as $pelicula){
        echo "<tr>";
        foreach($pelicula as $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

/*Funcion para saber la nota media de todas las peliculas
devuelve un array donde la primera posicion es la nota media
y la segunda es la total de peliculas
*/
function nota_media($peliculas){
    $total = count($peliculas);
    $notas = 0;

    foreach($peliculas as $pelicula){
      $notas += $pelicula["nota"];
    }
    return ([$notas/$total, $total]);
}
