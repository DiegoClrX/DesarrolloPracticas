<?php

    $cola = array();

    //Añade un elemento al principio del array
    function añadirCola($elemento,&$cola){
        array_unshift($cola, $elemento);
    }

    //Elimina el ultimo elemento del array
    function eliminarCola(&$cola){
        unset($cola[(count($cola)-1)]);
    }

    //Detecta si la cadena esta vacia o no, si no lo esta lo vacia
    function vaciarCola(&$cola){
        if(empty($cola)==false){
            unset($cola);
        }else{
            echo "ERROR <br> La cadena ya esta vacia";
        }
    }

    //Muestra el array
    function contenidoCola($cola){
        $cont = 0;
        foreach($cola as $elemento){
            $cont++;
            echo $cont." elemento -->".$elemento."<br>";
        }
    }
    for ($i=0; $i < 10; $i++) { 
    añadirCola($i,$cola);
    }   

    eliminarCola($cola);
    vaciarCola($cola);
    contenidoCola($cola);
?>