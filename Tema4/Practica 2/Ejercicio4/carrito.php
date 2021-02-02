<?php
session_start();

if (!isset($_SESSION['user-agent']))
    $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
else {
    if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
        session_destroy();
}
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Carrito</title>
</head>

<body>
    <h1 class="display-1">Carrito</h1>
    <?php
    function pintarCarrito($carrito)
    {
        $suma = 0;
        echo "<table  class='table'>";
        echo "<thead class = 'thead-dark'>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Cantidad</th>";
        echo "<th scope='col'>Precio</th>";
        echo "</thead>";
        //Recorrer el carrito
        echo "<tbody>";
        foreach ($carrito as $articulo) {

            echo "<tr>";
            echo "<td>" . $articulo['nombre'] . "</td>";

            echo "<td> <a href='carrito.php?restarCantidad=".$articulo['id']."'>"; ?>
           
           <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
            </svg>
           </a>
            <?php 
              echo"</a>".$articulo['cantidad'] . "<a href='carrito.php?sumarCantidad=".$articulo['id']."'";
            ?>

            <!--Sumar cantidad-->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
    <?php 
            echo "</td>";
            echo "<td>" . $articulo['precio'] . "</td>";
            echo "</tr>";
            $suma += $articulo['precio'];
        }
        echo "<tr>";
        echo "<td colspan = 2>Precio Total:</td>";
        echo "<td  colspan = 3>$suma</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
    //Pintar carrito
    pintarCarrito($_SESSION['carrito']);

/*
    //Borra el articulo del carrito
    if (isset($_GET['action'])) {
        if (($_GET['action'] == 'del')) {
            $long = count($_SESSION['carrito']);
            for ($i = 0; $i < $long + 1; $i++) {
                unset($_SESSION['carrito'][$i]);
            }
        }
    }*/

    //SUMA Y RESTA LAS CANTIDADES

    if(isset($_GET['sumarCantidad'])){
       foreach($_SESSION['carrito'] as &$articulo){
        if($_GET['sumarCantidad']==$articulo['id']){
           if($articulo['cantidad'] < 99){
            $articulo['cantidad'] = $articulo['cantidad'] + 1;  
            $articulo['precio'] = $articulo['precio']+$articulo['precio'];
           }
        }
       }
    }

    if(isset($_GET['restarCantidad'])){
        foreach($_SESSION['carrito'] as &$articulo){
         if($_GET['restarCantidad']==$articulo['id']){

            if($articulo['cantidad'] == 0){

                foreach($_SESSION['carrito'] as $borrar){
                    if($_GET['restarCantidad'] == $borrar['id']){
                        $pos = array_search($borrar, $_SESSION['carrito']);
                        unset($_SESSION['carrito'][$pos]);
                    }
                }
             }else{
                $articulo['cantidad'] = $articulo['cantidad'] - 1;
                $articulo['precio'] -= $articulo['precio'];
             }

         }
        
        }
         
     }

    ?>
    <a href="cabecera.php">
        <button class="btn btn-primary">Volver</button>
    </a>

    <a href="carrito.php?action=del">
        <button type="button" class="btn btn-primary" name="del">Borrar todo</button>
    </a>

    <a href="Ejercicio4.php">
        <button type="button" class="btn btn-primary">Imprimir</button>
    </a>



</body>

</html>