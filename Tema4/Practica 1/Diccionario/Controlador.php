<?php
if (!isset($_SESSION['diccionario'])) {
    $_SESSION['diccionario'] = leerArchivo("Diccionario.txt");
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'mostrarDiccionario') {
        //Le añadimos el archivo txt a la variable de sesion
        $_SESSION['diccionario'] = leerArchivo("Diccionario.txt");
        header("location: mostrarDiccionario.php");
    }
}

//Añade la palabra con su traduccion al archivo txt
if (isset($_POST['palabraEsp'])) {
    escribirPostArchivo($_POST);
    header("location: cabecera.php");
}



//Borra la palabra deseada del fichero 
if (isset($_POST['borradoEsp'])) {
    $_SESSION['diccionario'] = leerArchivo("Diccionario.txt");
    //Buscamos solo en la parte de Español
    if (in_array($_POST['borradoEsp'],array_column($_SESSION['diccionario'], 'espanol'))) {
        //Buscamos la posicion donde se encuentra la palabra
        $pos = array_search($_POST['borradoEsp'],array_column($_SESSION['diccionario'], 'espanol'));
        //Eliminamos la palabra
        unset($_SESSION['diccionario'][$pos]);
        //Sobrescribimos el archivo
        escribirArchivo($_SESSION['diccionario']);
    }
    header("location: mostrarDiccionario.php");

}

//--------------------------//APARTADO DE FUNCIONES\\ --------------------------\\

function leerArchivo($fichero){
    $palabras = array();
    //Leemos el archivo
    $datos = file_get_contents($fichero);

    //Nos creamos una array
    $datos = explode("\n", $datos);

    foreach ($datos as $valor) {
        //Recorriendo los datos del fichero hechos un array se lo añadimos a otro array bidimensional previamente haciendo un array de cada una de las palabras 
        $palabra = explode(",", $valor);
        $palabras[] = array("espanol" => $palabra[0], "ingles" => $palabra[1]);
    }

    return $palabras;
}
//Funcion de sobreescribir el fichero 
function escribirArchivo($array) {
    //Abrimos el archivo
    $file = fopen("Diccionario.txt","w");
    //Bloqueamos el archivo 
    if (flock($file, LOCK_EX)) {
        //Recorremos el array mientras lo vamos pintando
        foreach($array as $palabra) {
            fwrite($file,$palabra['espanol'].",".$palabra['ingles']."\n");
        }
    }
    fflush($file);
    //Quitamos el bloqueo
    flock($file, LOCK_UN);
    //Cerramos el fichero
    fclose($file);
}

function escribirPostArchivo($array) {
    $fp = fopen("Diccionario.txt", "a");
    fwrite($fp,"\n".$array['palabraEsp'] . "," . $array['palabraEn']);
    fclose($fp);
}
?>