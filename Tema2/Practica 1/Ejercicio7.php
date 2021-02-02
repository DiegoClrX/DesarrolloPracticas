<?php
//Funcion que te hace directamente la tabla de multiplicar
function tablaMultiplicar($num)
{
   
    for ($i = 0; $i <= 10; $i++) {
        $multi = $num*$i;
        echo $num." x ".$i." = ".$multi."<br>";
    }
    
}

//Array random
$arrayTable = array(rand(0, 99), rand(0, 99), rand(0, 99), rand(0, 99), rand(0, 99));

//Lo recorro mientras llamo a la funcion

foreach($arrayTable as $num){
    tablaMultiplicar($num);
    echo "<br>";
}
