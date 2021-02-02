<?php
    //Para sacar los numeros aleatorios he utilizado la funcion rand y le he pasado un rango de numeros
    $primera = rand(0, 100);
    $segunda = rand(0, 100);
    $diferencia = $primera - $segunda;
    //Aqui lo que he hehco es redondear el numero para que solo quede un decimal ejemplo: "1.5"
    $division = round($primera / $segunda, PHP_ROUND_HALF_UP);

    echo "La diferencia entre los numeros: ".$primera." y ".$segunda." es ".$diferencia."<br>";
    echo "La division entre los numeros: ".$primera." y ".$segunda." es ".$division;

?>