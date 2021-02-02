<?php
 
$cadena1 = "Lo que estoy escribiendo es un string. ";
//$cadena2 = "muuuuuy largo. texto";
$cadena2 = "Esto es un parrafo de prueba para probar como puedo mirar tanto la ultima e y la ultima u, acto seguido identificar la posicion de la palabra texto";
$cadena3 = $cadena1.$cadena2;
$palabraTexto = strrpos($cadena3, "texto");
$letraE = strpos($cadena3, "e");
$letraU = strrpos($cadena3, "u");

echo $cadena3."<br>";
echo "Donde empieza la palabra texto es ".$palabraTexto."<br>";
echo "La posicion de la primera E es ".$letraE."<br>";
echo "La posicion de la ultima u es ".$letraU."<br>";
?>