<?php

$direccion = "192.168.11.200";
$arrayNum = explode(".",$direccion);
$direccion2 = implode(":", $arrayNum);
$direccion = implode(" ", $arrayNum);
echo "Esta es la ip con espacios ".$direccion."<br>";
echo "Esta es la ip con : ".$direccion2."<br>";
?>