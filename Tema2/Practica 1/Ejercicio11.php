<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
    </head>
<body>
    
</body>
</html>
<?php

$vector = 0;
$vector2 = 0;
$datos = array();
//Muestra una tabla 7x7
for($i=0;$i<7;$i++) {
    
    for($j=0;$j<7;$j++) {
        if ($i==$j) {
            $datos[$i][$j] = 1;
        } else {
            $datos[$i][$j] = rand(0,9);
        }
    }
}

//Muestro la tabla
foreach($datos as $fila){
    foreach($fila as $columna){
        echo $columna;
        $vector ++;
    $vector2 ++;
    }
    echo "<br>";
}

echo "Esto seria la suma de todas las columnas ".$vector."(7*7)"."<br>";
echo "Esto seria la suma de todas las filas ".$vector2."(7*7)"."<br>";

?>