<?php
//Creas un array con diferentes colores
$colores = array("red","green", "blue", "purple", "pink", "black", "gray", "orange", "yellow");

for($i=0; $i <5; $i++){
    //Creas un numero random que mida la longitud del array
    $numRand = rand(0, (count($colores)-1));
    //Una variable que guarde el color
    $color = $colores[$numRand];
    //Con la variable ya creada la pasas al fill
    echo "<svg height='100' width='100'>
    <circle cx='50' cy='50' r='40' ; stroke-width='3' fill='$color' />
    </svg>";
}

?>