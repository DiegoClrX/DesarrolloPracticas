<?php

function encriptar($mensaje, $clave)
{
    $mensajeEncriptado = explode(" ", $mensaje);
    // invierte cada palabra
    foreach ($mensajeEncriptado as &$palabra) {
        $palabra = strrev($palabra);
    }
    //cada numero se suma por la clave que le pases
    $mensaje = implode(" ",$mensajeEncriptado);
    for ($i = 0; $i < strlen($mensaje); $i++) {
        $mensajeEncriptado[$i] = (ord($mensaje[$i]) + $clave);
    }

    // devuelve una cadena con el mensaje encriptadpo
    $mensajeEncriptado = implode(" ", $mensajeEncriptado);
    return $mensajeEncriptado;
}

function desEncriptar($mensaje, $clave)
{
    //Convierte el mensaje en un array y le da la vuelta result = Mensaje que deberia ser "Hola Diego" --> "Diego Hola"
    $mensajeEncriptado = array();
    $mensajeEncriptado = explode(" ",$mensaje);
    $mensajeEncriptado = array_reverse($mensajeEncriptado);

    //Traducimos el codigo de ascii a letra
    foreach($mensajeEncriptado as &$num){
        $num = chr($num - $clave);
     }

     //Volvemos ha darle la vuelta al mensaje para que quede como deberia ser result  "Diego Hola"--> "Hola Diego" 
    $mensajeEncriptado = implode($mensajeEncriptado);
    $mensaje = explode(" ", $mensajeEncriptado);
    $mensaje = array_reverse($mensaje);
    $mensaje = implode(" ", $mensaje);
    return $mensaje;
}

$mensaje = encriptar("hola Diego", 3);
echo $mensaje."<br>";

$mensaje2 = desEncriptar($mensaje, 3);
echo $mensaje2;
    

?>