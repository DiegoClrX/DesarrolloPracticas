<?php

include_once("cabecera.php");

$_SESSION['palabras'] = array(
    "hola", "caballo", "ordenador", "casa", "teclado", "raton", "paralela", "goma", "sombrero", "cascos", "poster", "diccionario", "altavoz", "videojuego", "alfombrilla", "estanteria", "titulo", "policia", "balon", "microfono", "zombie", "palabras", 
    "soporte", "españa", "movil", "puerta", "pomo", "marco", "llaves", "rueda", "embrague", "freno", "amarillo", "negro", "violeta", "alarma", "porra", "pistola", "chaleco", "pino", "plancha", "abdominal", "pectoral", "sony", "rojo", "calcetin", "pantalon",
     "camiseta", "collar", "fuego", "hielo", "naranja", "vigilante",  "mesa", "esta", "ordenador", "movil", "teclado", "raton", "pizarra", "hola",
     "tenis", "pantalon", "camiseta", "felpudo", "radio", "la", "lapiz", "boligrafo", "mando", "caja", "cable", "internet", "electricidad", "aire",
     "viento", "lluvia", "nubes", "gafas", "negro", "blanco", "amarillo", "azul", "marron", "verde", "morado", "soporte", "compañero", "amigo",
     "madre", "padre", "novia", "abuela", "abuelo", "luz", "sol", "luna", "agua", "frio", "calor", "velocidad", "coche", "frenos", "calvo");

//Inicializa las variables en caso de no estar iniciadas
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
if (!isset($_SESSION['palabraMostrada'])) {
    $_SESSION['palabraMostrada'] = "";
}
if (!isset($_SESSION['palabra'])) {
    $_SESSION['palabra'] = "";
}
if (!isset($_SESSION['letra'])) {
    $_SESSION['letra'] = "";
}
if (!isset($_SESSION['imagen'])) {
    $_SESSION['imagen'] = 0;
}

//Redirige a otra pagina y comienza el juego 
//Esta el numero aleatorio que da la palabra aleatoria y despues dicha palabra se guarda en otra variable con todas las letras remplazadas por "_"
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'iniciarJuego') {
        $_SESSION['numRand'] = rand(0, count($_SESSION['palabras']) - 1);
        $_SESSION['palabraMostrada'] = $_SESSION['palabras'][$_SESSION['numRand']];
        $_SESSION['palabra'] = preg_replace('/\w/i', '_ ', $_SESSION['palabraMostrada']);
        $_SESSION['contador'] = 0;
        header("location: juegoIniciado.php");
    }
        if ($_GET['action'] == 'finalizarJuego') {
            //session_destroy();$_SESSION['contador'] = 0;
            
            echo "<script>"."alert('Juego finalizado la palabra era ".$_SESSION['palabraMostrada']."');</script>";
        }
}



 
//Controla que la palabra oculta se vaya tranformando poco a poco en la palabra acertada
if (isset($_POST['letra'])) {

    $_SESSION['letra'] = strtolower($_POST['letra']);

    if ($_SESSION['contador'] < 6) {

        //Comprueba la posicion si es falsa o no y convierte la palabra oculta con las letras correspondientes en caso contrario suma uno al contador de fallos
        $_SESSION['palabra'] = explode(" ",$_SESSION['palabra']);

            //La recorremos en busca de la letra acertada y se la modificamos
            for ($i = 0; $i <= strlen($_SESSION['palabraMostrada'])-1; $i++) {

                //Si la letra es igual a la letra obtenida la cambiamos por la letra oculta
                if ($_SESSION['palabraMostrada'][$i] == $_SESSION['letra']) {
                    $_SESSION['palabra'][$i] =  $_SESSION['letra'];
                }

            }
            
            //Devuelve el array en texto plano 
            $_SESSION['palabra'] = implode(" ", $_SESSION['palabra']);

        }

        //Busca la letra en la palabra y busca si esta en la palabra
        if(strstr($_SESSION['palabraMostrada'], $_SESSION['letra'])==false){
           $_SESSION['contador']++;
        }

        //Si el contador llega a 6 redirige a una pagina la cual desvela la palabra y reinicia juego
        if($_SESSION['contador']==6){
            header("location:palabraDescubierta.php");
        }else{
            header("location: juegoIniciado.php");
        }

    }

    

//Le da un valor a la variable de sesion de imagen para que despues en juegoIniciado coloque la imagen segun los fallos que tengas
    switch ($_SESSION['contador']) {
        case 0:
            $_SESSION['imagen'] = 0;
        break;
        case 1:
            $_SESSION['imagen'] = 1;
        break;
        case 2:
            $_SESSION['imagen'] = 2;
        break;
        case 3:
            $_SESSION['imagen'] = 3;
        break;
        case 4:
            $_SESSION['imagen'] = 4;
        break;
        case 5:
            $_SESSION['imagen'] = 5;
        break;
        case 6:
            $_SESSION['imagen'] = 6;
        break;
    }

    //Igualamos Letra a cadena vacia y seguimos con el juego
    //$_POST['letra'] = "";
   

?>