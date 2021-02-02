<?php

$a = 30; 
$b = 20; 
$c = 10; 

$neg = -1; 

//Tranformo b en valor negativo
$menosb = $b * $neg; 
//Hago las operaciones de dentro de la raiz
$oper1 = pow($b,2); 
$oper2 = 4*$a*$c; 
//Las resto 
$resta = $oper2-$oper1; 
//hago la raiz 
$raiz = sqrt($resta); 
$dosa = 2*$a; 

//Se calculan y se muestran los resultados
$result1 = ($menosb + $raiz)/$dosa; 
$result2 = ($menosb - $raiz)/$dosa; 

echo"Solucion 1= $result1<br>"; 
echo"Solucion 2 = $result2"; 
?>
