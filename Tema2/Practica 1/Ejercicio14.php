<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
<?php

$alumnos = array(
    array("nombre" => "Alejandro", "materia" => "servidor", "nota" => 9),
    array("nombre" => "Lucas", "materia" => " cliente", "nota" => 6),
    array("nombre" => " Alba", "materia" => "servidor", "nota" => 6),
    array("nombre" => "Alvaro", "materia" => "cliente", "nota" => 4),
    array("nombre" => "Fernando", "materia" => "servidor", "nota" => 6),
    array("nombre" => "Diego", "materia" => "despliegue", "nota" => 10),
    array("nombre" => "Eleine", "materia" => "despliegue", "nota" => 4),
    array("nombre" => "Anastasia", "materia" => "cliente", "nota" => 2),
    array("nombre" => "Rocio", "materia" => "servidor", "nota" => 1),
    array("nombre" => "Angelica", "materia" => "servidor", "nota" => 10)
);

//ordena de mayor a menor [Nota]
function ordenMayor($a, $b)
{
    return $a["nota"] < $b["nota"];
}

//Ordena por nombres
function ordeName ($a, $b) 
{    
    return strcmp ($a['nombre'] , $b['nombre'] );                                    
}

//muestra la media del curso
function notaMedia($alumnos){
    $nota = 0;
    $cont = 0;
    foreach($alumnos as $alumno){
        $nota += $alumno["nota"];
        $cont++;
    }
    $nota = ($nota/$cont);
    echo "<h1 class='display-1'> La nota media del curso es $nota</h1>";
}

//Funcion que saca el total de suspensos del alumno
function suspensos($alumnos){
    $nota = 0;
    $cont = 0;
    foreach($alumnos as $alumno){
        $nota += $alumno["nota"];
        if($alumno["nota"]<5){
            $cont++;
        }
    }
    echo "<h1 class='display-1'> El numero de suspensos de la clase es $cont</h1>";
}

//Muestra el array de alumnos
function mostrarAlumnos($alumnos){
    echo "<table class='table table-striped table-dark'>";
    foreach ($alumnos as $alumno) {
        echo "<tr>";
        echo "<td>" . $alumno['nombre'] . "</td>";
        echo "<td>" . $alumno['materia'] . "</td>";
        echo "<td>" . $alumno['nota'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";

}
//Resultados
echo "<h1 class='display-1'> Primera tabla ordenada por notas </h1>";
uasort($alumnos, "ordenMayor");
mostrarAlumnos($alumnos);

echo "<h1 class='display-1'> Segunda tabla ordenada por nombre </h1>";
usort($alumnos, 'ordeName');
mostrarAlumnos($alumnos);

echo "<br>";
notaMedia($alumnos);

echo "<br>";
suspensos($alumnos);
