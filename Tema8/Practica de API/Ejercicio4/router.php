<?php
    namespace Monedas;

    include_once("Controllers/controller.php");

    use Monedas\Controller;

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    
    //Quitamos todos los paths hasta quedarnos con Ejercicio4
    $uri = strstr($uri,"Ejercicio4");

    //Pasamos lo que queda de ruta a un array
    $paths = explode("/",$uri);

    $apiname = array_shift($paths); //apicanciones
    $resource = array_shift($paths); //canciones
   
    if($resource == 'monedas'){
        //Creamos objeto controlador
        $controller = new Controller();

        //Sacamos el siguiente parámetro de la url
        $action = array_shift($paths);

        //Sacamos todas las canciones
        if(empty($action)){
            $controller->handle_base($method);
        } 

        switch ($action) {
            case "criptoc":  
                //Mostrar las 50 primeras lineas
                $controller->viewCoins($method);              
                break;

            case "id":
                //Vota por una canción, a continuación debe venir id de una canción y la nota
                $method = array_shift($paths);
                $id =  array_shift($paths);
                if (!empty($id) && !empty($method))
                    $controller->viewCoin($method, $id);
                else 
                    header('HTTP/1.1 404 Not Found');   

            case "up":
                //Acciones para subir 0,1% al valor de la moneda
                $id = array_shift($paths);
                if (!empty($id))
                    $controller->upCoin($method, $id);
                else
                    header('HTTP/1.1 404 Not Found');
                break;

            case "down":
                //Acciones para subir 0,1% al valor de la moneda

                $id = array_shift($paths);
                if (!empty($id))
                    $controller->downCoin($method, $id);
                else 
                    header('HTTP/1.1 404 Not Found');
                break;

            case "topValue":
                //Muestra las 10 primeras monedas ordenador por precio         
                $id = array_shift($paths);
                if (!empty($id))
                    $controller->teen_coins();
                else 
                    header('HTTP/1.1 404 Not Found');
                break;
                       
        }

        
    } else {
        // Sólo se aceptan resources desde 'songs'
        header('HTTP/1.1 404 Not Found');
    }      

?>