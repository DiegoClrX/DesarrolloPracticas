<?php

$dni = rand(00000000, 99999999);
//Calcula el valor del DNI
$valor = (int) ($dni / 23);
$valor *= 23;
$valor = $dni - $valor;
//Las letras disponibles en el dni
$letras = "TRWAGMYFPDXBNJZSQVHLCKEO";
//una vez calculado el DNI devuelve la letra
$letraNif = substr($letras, $valor, 1);
echo $dni.$letraNif;

?>