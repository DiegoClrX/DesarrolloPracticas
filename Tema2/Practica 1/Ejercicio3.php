<?php
    //Aplico un valor aleatorio al radio
    $radio = rand(0, 500);
    //Aplico la formula del volumen de la esfera
    $volumen = (4/3)*(3.14*$radio);
    echo "El radio del circulo es ".$radio."<br> el volumen del circulo es ".$volumen;

?>