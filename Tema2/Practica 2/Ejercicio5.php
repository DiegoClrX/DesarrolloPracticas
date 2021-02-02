<?php

//Encripta el mensaje devolviendo un mensaje encriptado 
function encriptar($mensaje, $clave){
  $mensajeEncriptado = array();
    //cada numero se suma por la clave que le pases
   for ($i=0; $i < strlen($mensaje); $i++) { 
    $mensajeEncriptado[$i] = (ord($mensaje[$i])+$clave);
   }
   // devuelve una cadena con el mensaje encriptadpo
   $mensaje = implode(" ",$mensajeEncriptado);
   return $mensaje;
}
//Desencripta el mensaje el mensaje desencriptado
function desEncriptar($mensaje, $clave){
  //Crea un array para almacenar uno a uno los numeros
  $mensajeEncriptado = array();
  $mensajeEncriptado = explode(" ",$mensaje);
   //cada numero se resta por la clave que le pases
   foreach($mensajeEncriptado as &$num){
      $num = chr($num - $clave);
   }
  // devuelve una cadena con el mensaje desencriptado
   $mensaje = implode($mensajeEncriptado);
   return $mensaje;
}

$mensajeEncriptado = encriptar("Hola me llamo diego", 3);
echo $mensajeEncriptado."<br>";

$mensajeDesencriptado = desEncriptar($mensajeEncriptado,3);
echo $mensajeDesencriptado;

?>