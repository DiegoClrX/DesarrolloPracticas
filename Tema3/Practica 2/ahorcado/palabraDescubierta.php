<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabra Descubierta</title>
</head>

<style>
 .botonDevuelta:hover{
    transform: scale(0.9);
    transition: all 0.2s linear;
}
</style>

<body style="background-color: #202020;">
    <div style="margin-top: 10%;">
        <p style="font-size:60px; color:white; text-align: center;">La palabra era</p>
        <p style="font-size:60px; color:blueviolet; text-align: center;"> <?php echo $_SESSION['palabraMostrada']; ?> </p>
        <p style="font-size:40px; color:white; text-align: center;">La proxima lo haras mejor</p>
        <a href="controlador.php?action=iniciarJuego">
        <button type="button" class="botonDevuelta" name="iniciarJuego" style="width: 30%; height: 200px; margin-left: 36%; color:white; background-color: blueviolet; font-size: 50px;">Volver a jugar</button>
        </a>
    </div>
</body>

</html>