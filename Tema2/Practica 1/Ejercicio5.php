<?php
    //Doy un numero aleatorio en un rango de 0 - 99
    $numRand = rand(0, 99);
    //En este bloque lo que hago es conseguir dividir el numero ejemplo: (36 => 3, 6) sin decimales
    echo "El numero es ".$numRand."<br>";
    $num1 = bcdiv(($numRand / 10), '1', 0);
    echo "Primer numero ".$num1."<br>";
    $num2 = $numRand % 10;
    echo "Segundo numero ".$num2."<br>";

    //Estos switch son para definir un numero por la palabra
        switch($num1){
            case '0':
                echo "cero";
            break;
            case '1':
                echo "diez";
            break;
        
            case '2':
                echo "veinte";
            break;
        
            case '3':
                echo "treinta";
            break;
        
            case '4':
                echo "cuarenta";
            break;
        
            case '5':
                echo "cincuenta";
            break;
        
            case '6':
                echo "sesenta";
            break;
        
            case '7':
                echo "setenta";
            break;
        
            case '8':
                echo "ochenta";
            break;
        
            case '9':
                echo "noventa";
            break;
        }
    
    echo " y ";

        switch($num2){
            case '0':
                echo "cero";
            break;
            
            case '1':
                echo " uno";
            break;
        
            case '2':
                echo " dos";
            break;
        
            case '3':
                echo " tres";
            break;
        
            case '4':
                echo " cuatro";
            break;
        
            case '5':
                echo " cinco";
            break;
        
            case '6':
                echo " seis";
            break;
        
            case '7':
                echo " siete";
            break;
        
            case '8':
                echo " ocho";
            break;
        
            case '9':
                echo " nueve";
            break;
        }
    




?>