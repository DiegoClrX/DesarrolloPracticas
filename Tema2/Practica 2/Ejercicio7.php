<?php
    include_once("Cabecera.php");

$iva = 0.21;
$carrito = array(
    array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
    array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
    array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
);
echo "<h1 class='display-1'>Carrito de la compra</h1>";
echo "<table style='background-color: white;'></table>";
//Calcula el precio total con IVA
function totalIVA( $linea_pedido)
{
        $subtotal = 0;
        foreach($linea_pedido as $carro){
            if($carro["iva_r"] == 0){
                $subtotal += $carro["precio"]+($carro["precio"]*0.21);
            }
            else{
                $subtotal += $carro["precio"]+($carro["precio"]*0.10);
            }
        }
        return $subtotal;
    
    
}

//Calcula el precio total sin contar el IVA
function totalSinIVA($linea_pedido){
    $total = 0;
    foreach($linea_pedido as $carro){
            $total += $carro["precio"];
    }
    return $total;
}


//Muestra la tabla html
function mostrarCarrito($carrito){
    echo "<table class='table table-striped table-dark'>";

    foreach ($carrito as $linea_Pedido) {
    echo "<tr>";
    echo "<td>" . $linea_Pedido['nombre'] . "</td>";
    echo "<td>" . $linea_Pedido['precio'] . "</td>";
    echo "<td>" . $linea_Pedido['cant'] . "</td>";
    echo "<td>" . $linea_Pedido['iva_r'] . "</td>";
    echo "</tr>";
    }
    echo "<tr>";

    echo ("<th>Precio sin IVA</th>");
    echo ("<td>".totalSinIVA($carrito)."</td>");
    echo ("<th>Precio con IVA</th>");
    echo ("<td>".totalIVA($carrito)."</td>");

    echo "</tr>";


    echo "</table>";
}

mostrarCarrito($carrito);
?>