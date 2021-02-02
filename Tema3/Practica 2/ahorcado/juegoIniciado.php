<?php include_once("cabecera.php"); ?>
<div style="border: 1px solid violet; margin-right: 30%; margin-left: -15%; margin-top: 5%; padding:10%; color: white;">
    <p  style=" font-size:60px; color:blueviolet">Juego iniciado</p>
    <p style="margin-bottom: -1%; font-size: 30px">¿Cual sera la palabra?</p>

    <!--Mostramos la palabra con rayas-->
    <?php echo "<p style ='font-size: 55px;'>".$_SESSION['palabra']."</p>";
    ?>
    
    <form action="controlador.php" method="post">
        <input type="text" name="letra" placeholder="Poner solo una letra" style="width: 30%; height: 38px;"><br>
        <input type="submit" value="Probar" class="btn btn-primary" style="margin-top: 5%;">
        <a href="controlador.php?action=iniciarJuego" >
        <button type="button" class="btn btn-primary" name="iniciarJuego" style="margin-top: 5%; margin-left: 5%;">Cambiar Palabra</button>
    </a>
    </form>

    <!--Boton de descubrir la palabra del Juego-->
    <a href="palabraDescubierta.php" style="position: absolute; margin-left: 45%; margin-top: -26%;">
        <button type="button" class="btn btn-primary" name="finalizarJuego">Descubrir</button>
    </a>

    <div style="margin-left: 30%;position: absolute; margin-top: -17%;">
        <img src=<?php echo "'imagenes/".$_SESSION['imagen'].".jpg'";?> alt="imagen de ahorcado">
    </div>

<?php include_once("piePagina.php"); ?>