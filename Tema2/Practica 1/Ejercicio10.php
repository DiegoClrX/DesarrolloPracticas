<?php
//Esta funcion dice si es par o impar el numero 
function numParImpar($num){
    $bool = true;
    if($num % 2 == 0){
        return true;
    }else{
        return false;
    }
}

$numNaturales = array(rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9));
$cont = 0;
$suma = 0;

//Recorre el array en busca de los numeros pares e impares y los va sumando a una variable para luego hacer la media con el contador
foreach($numNaturales as $num){
    if(numParImpar($num)==true){
        $cont++;
        $suma += $num;
    }else{
        echo "numero impar --> ".$num."<br>";
    }
}

echo "La media de los numeros pares es --> ".($suma/$cont)."<br>";

?>