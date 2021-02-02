<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ejercicio 12</title>
</head>

<body>
    <h1>Ejercicio 12</h1>
    <form name="formulario" method="post" action="Ejercicio12.php"  class="form-group">
        Nombre: <input type="text" name="nombre" value="">
        <input type="submit" />

    </form>

</body>

</html>
<?php

$arrayDiccionario = array(
    "Hola" => "hello",
    "adios" => "bye",
    "sol" => "sun",
    "luna" => "moon",
    "agua" => "water",
    "tierra" => "land",
    "mundo" => "world",
    "week" => "then",
    "teclado" => "keyboard",
    "raton" => "mouse",
    "pantalla" => "screen",
    "portatil" => "laptop",
    "gafas" => "glasses",
    "alfombrilla" => "mat",
    "pijama" => "headphones",
    "pantalon" => "trousers",
    "botella" => "bottle",
    "telefono" => "phone",
    "papel" => "paper",
    "negro" => "black",
    "blanco" => "white"
);

//Busca la palabra en el diccionario y la devuelve en ingles
if (isset($_POST['nombre'])) {
    if (array_key_exists($_POST['nombre'],$arrayDiccionario))
        echo $arrayDiccionario[$_POST['nombre']];
}

?>