<?php
include_once("../Controller/autoload.php");

use blackJack\jugador;
use blackJack\barajInglesa;
use blackJack\Carta;
use blackJack\partida;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>BlackJack By Diego</title>
</head>

<body style="background: url(images/tablero.jpg) no-repeat top center">
    <header>
        <div id="centrar">
            <!-- <h1 style="text-align: center; margin-top: 0%; margin-left: 0%; color:black;"><img src="images/poker.png" alt="" width="7%"> Bienvenido BlackJack <img src="images/poker.png" alt="" width="7%"></h1> -->
        </div>
    </header>
    <!-- CERRAR SESION -->
    <div style="background:url(images/black.png) no-repeat; width: 60%; height: 500px; margin-left: 20%; margin-top: 11%;">



        <!-- REINICIAR PARTIDA -->

        <button type="button" id="reset"><img src="images/reset.png" alt="" width="3%" style=" position:absolute; margin-top: 32%; margin-left: 27%;"></button>

        <!-- JUGAR PARTIDA -->


        <button type="button" id="jugar"><img src="images/jugar.png" alt="" width="2.5%" style="position:absolute; margin-top: 32.3%; margin-left: 31%;"></button>


        <!-- PEDIR CARTA -->


        <button type="button" id="addCarta"><img src="images/cartas.png" alt="" width="4%" style="position:absolute; margin-top: 30%; margin-left: 34%;"></button>


        <!-- PLANTARSE -->

        <button type="button" id="plantarse"><img src="images/mano.png" alt="" width="4%" style="position:absolute; margin-top: 30%; margin-left: 16%;"></button>

        <div id="contenido"></div>
    </div>

    <!-- CARTAS -->
    <script>
        //Pide una carta
        document.getElementById('addCarta').addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "addCarta"); //Acción al controlador para verclientes

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();

            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data;

        });
        //Se planta
        document.getElementById('plantarse').addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "plantarse"); //Acción al controlador para verclientes

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();

            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data;

        });
        //Reiniciar Partida
        document.getElementById('reset').addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "jugar"); //Acción al controlador para verclientes

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();

            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data;

        });
        //Jugar Partida
        document.getElementById('jugar').addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "jugar"); //Acción al controlador para verclientes

            let res = await fetch("../Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let data = await res.text();

            //Pintamos la respuesta en el contenedor
            document.getElementById("contenido").innerHTML = data;

        });
    </script>
</body>

</html>