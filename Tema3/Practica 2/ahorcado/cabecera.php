<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>AHORCADO</title>
</head>

<body style="background-color: #202020; color: white;">
<div style="margin-left: 30%;">
<div style="margin-top: 4%;">
    <h1>Bienvenido al ahorcado</h1>
    <p>En este juego deberas darle al boton de inicio y te saldra una palabra aleatoria que tendras que adivinar</p>
    <a href="controlador.php?action=iniciarJuego">
        <button type="button" class="btn btn-primary" name="iniciarJuego">Iniciar Juego</button>
    </a>
</div>
