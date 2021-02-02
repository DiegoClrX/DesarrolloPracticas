<?php

$clientes = array("diego", "isma", "eduard", "bil", "javi");

function convierteAlumnos($clientes, $opcion){
    strtolower($opcion);
    switch($opcion){
        case 'l':
            foreach($clientes as $cliente){
                echo strtolower($cliente)." ";
            }
        break;

        case 'u':
            foreach($clientes as $cliente){
               echo strtoupper($cliente)." ";
            }
        break;

        case 'm':
            foreach($clientes as $cliente){
                echo ucfirst($cliente)." ";
            }
        break;
    }
}
echo "Primer caso <br>";
convierteAlumnos($clientes, 'l');
echo "<br> Segundo caso <br>";
convierteAlumnos($clientes, 'u');
echo "<br> Tercer caso <br>";
convierteAlumnos($clientes, 'm');

?>