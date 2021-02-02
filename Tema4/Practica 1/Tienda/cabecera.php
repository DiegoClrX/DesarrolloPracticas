<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="Ejercicio6.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<style>
    .contenedor {

        width: 90%;
        margin-left: 3%;
    }

    .padre {
        margin: 0 0 20% 7%;
        width: 100%;
        padding: 5%;

    }

    .producto {
        background-image: url("imagenes6/fondo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        width: 20%;
        height: 400px;
        float: left;
        margin: 0 0 5% 6%;
        border: 1px solid #006CFF;
        padding: 0%;
    }

    .producto:hover {
        transform: scale(1.2);
        transition: all 0.4s linear;
    }

    .img {
        width: 75%;
        margin-left: 15%;
    }
</style>

<body>
    <div class="contenedor">
        <a href="añadirProducto.php">X</a>
        <?php

if(!isset($_SESSION['listaProductos'])){
    $_SESSION['listaProductos'] = array();
}
$_SESSION['listaProductos'] = array();


        /*----------------------------------------------------------------------*/
        /*                              METODOS                                */
        /*--------------------------------------------------------------------*/
        $_SESSION['listaProductos'] = leerArchivo("store.txt");
        print_r($_SESSION['listaProductos']);
       
            //Añade las listaProductos al archivo txt 
            $cont = 0;
            if (isset($_POST['nombre'])) {
                $imagen = uploadFile();
                $_SESSION['listaProductos'] = leerArchivo("store.txt");
                if(count($_SESSION['listaProductos'])> 0 ){
                    for ($i = 0; $i < count(array_column($_SESSION['listaProductos'], 'id')); $i++) {
                        $cont++;
                    }

                    $fp = fopen("store.txt", "a");
                    fwrite($fp, $cont . "@" . $_POST['nombre'] . "@" . $_POST['precio'] . "@" . $_POST['descripcion'] . "@" . substr($_POST['imagen'], 0, strlen($_POST['imagen'])-4)."|");
                    fclose($fp);
                }
            }
        ?>

        <header>
            <h1 style="text-align: center; " class="display-1">SerPolicia.es</h1>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link active" href="|" style="margin-left: 2%;">Inicio</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="|" style="margin-left: 2%;">Ruta 091</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="|" style="margin-left: 2%;">Requisitos</a>
            </nav>
        </header>
        <section>
            <div style="margin-bottom: 6%; margin-left: 35%; position: absolute;">
                <a class="nav-link" href="carrito.php"><img src="imagenes6/carrito.png" alt="" style="width:4.2%; float:right; margin-right: 15%;"></a>
                <a class="nav-link" href="login.php"><img src="imagenes6/user.png" alt="" width="3%" style="margin-right: 3%; margin-bottom: 5%; margin-top: -1.2%; float:right;"></a>
            </div>
        </section>

        <section>

            <?php pintarProductos($_SESSION['listaProductos']); ?>

        </section>

        <footer style="margin-top: 110%; background-color: #006CFF; color: white; width:100%">
            <p style="text-align: center; padding: 4%;">
                Copyright 2020 © serPolicia <br>
                Going Forward S.L. Todos los derechos reservados <br>
                Aviso Legal | Privacidad | Devoluciones y cancelaciones | Preguntas frecuentes <br>
            </p>
        </footer>
    </div>
</body>

</html>
<?php 
        /*----------------------------------------------------------------------*/
        /*                              FUNCIONES                              */
        /*--------------------------------------------------------------------*/

function leerArchivo($fichero)
{
    $productos = array();
    //Leemos el archivo
    $datos = file_get_contents($fichero);

    //Nos creamos una array
    $datos = explode("|", $datos);

    foreach ($datos as $valor) {
        //Recorriendo los datos del fichero hechos un array se lo añadimos a otro array bidimensional previamente haciendo un array por cada elemento
        $producto = explode("@", $valor);
        $productos[] = array("id" => $producto[0], "nombre" => $producto[1], "precio" => $producto[2], "descripcion" => $producto[3], "imagen" => $producto[4], FILE_APPEND | LOCK_EX);
    }

    return $productos;
}

function pintarProductos($productos)
{
    echo "<h1 class= 'display-1' style = 'text-align: center; margin-top:5%'>Productos</h1><br>";
    echo "<div class='padre'>";
    foreach ($productos as $articulo) {
        echo "<div class='producto' >";
        echo '<img src="/products/' . $articulo["imagen"] . '.jpg" class="img" style = "margin-top:5%; margin-left:13%" alt="...">';
        echo "<p style = 'padding:3%; text-align:center;' name ='nombre'>" . $articulo['nombre'] . "</p>";
        echo "<p style = ' text-align:center;'>" . $articulo['precio'] . "€</p>";
        echo "<p style = ' text-align:center;'>" . $articulo['descripcion'] . "</p>";
        echo "<form method='post'>";
        echo "<input type='submit' value='añadir' name='añadir' class='btn btn-primary' style = 'margin-left:38%'>";
        echo "</form>";

        echo "</div>";
    }

    echo "</div>";
}

 //Función para subir un archivo al servidor
 function uploadFile() {
    $directorioSubida = "../products/";
    $max_file_size = "5120000";
    $extensionesValidas = array("jpg");
    $mimesValidos = array("image/jpg");
    if(isset($_FILES['imagen'])){
        $errores = array();
        $nombreArchivo = $_FILES['imagen']['name'];
        $filesize = $_FILES['imagen']['size'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $arrayArchivo = pathinfo($nombreArchivo);
        $extension = $arrayArchivo['extension'];
        // Comprobamos la extensión del archivo
        if(!in_array($extension, $extensionesValidas)){
            $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
        }

        //Comprobar que el mime del archivo coincide con el tipo de extensiones permitidas
        $mimeinfo = finfo_open(FILEINFO_MIME);
        if(!$mimeinfo){
            $errores[] = "Por motivos de seguridad no puedo analizar el archivo";
        }else{
            $mimereal = finfo_file($mimeinfo, $_FILES["imagen"]["tmp_name"]);
            $mimereal = explode(";",$mimereal)[0]; //Quito lo que viene tras ;
            if(!in_array($mimereal,$mimesValidos)) {
                $errores[] = "El mime real no corresponde. $mimereal";
            }
        }

        // Comprobamos el tamaño del archivo
        if($filesize > $max_file_size){
            $errores[] = "La imagen debe de tener un tamaño inferior a 50 kb";
        }

        // Comprobamos y renombramos el nombre del archivo [opcional]
        $nombreArchivo = $arrayArchivo['filename'];
        $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
        $nombreArchivo = $nombreArchivo . rand(1, 100);

        // Desplazamos el archivo si no hay errores
        if(empty($errores)){
            $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
            move_uploaded_file($directorioTemp, $nombreCompleto); 
            return substr($nombreCompleto, 3); //Para quitar el ../            
        } else {
            return $errores;
        }
        
    }
}

?>