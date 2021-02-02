<?php
include("controlador.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/tituloOptionGame.css">
  <link rel="stylesheet" href="css/optionGame.css">
  <title>optionGame</title>
</head>

<body>
  <header>
    <svg viewBox="0 0 960 300">
      <symbol id="s-text">
        <text text-anchor="middle" x="50%" y="80%">JuegaCiam</text>
      </symbol>

      <g class="g-ants">
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
      </g>
    </svg>
  </header>

  <nav style="margin-top: 10%; margin-left: 25%;">
    <ul>
      <li style="text-decoration: none; color: black;" data-toggle="modal" data-target="#nuevaPartida" data-whatever="@getbootstrap" style="margin-left: 40%;" name="add">Crear Partida</li>
      <li><a href="controlador.php?action=cargarPartida" style="text-decoration: none; color: black;">cargar partida</a></li>
      <li><a href="controlador.php?action=cerrarSesion" style="text-decoration: none; color: black;">cerrar sesion</a></li>
    </ul>
  </nav>
  </div>

  <!-- MODAL NOMBRE PARTIDA-->
  <div class="modal fade" id="nuevaPartida" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">PARTIDA</h5>

        </div>
        <div class="modal-body">
          <form method="POST" action="controlador.php">
            <input type="text" name="nombrePartida" class="form-control" style=" margin-bottom:2%;" placeholder="nombre de partida" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="crearPartida">Crear</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php 
  if(count( $_SESSION['partida'])>0){
    mostrarPartida( $_SESSION['partida']);
  }
  ?>

</body>
<?php

//##########################################
//              Funciones
//#########################################
/**
 * Esta funcion sirve para poder mostrar las partidas que tenga guardada el usuario que haya iniciado sesion
 */

function mostrarPartida($array){
  echo "<table class = 'table' style = 'margin-top:5%; margin-left:31%; width:40%'>";
  echo "<thead class = 'thead-dark' style='margin-left:500%'>";
  echo "<th scope='col'>Nombre</th>";
  echo "<th scope='col'>usuario</th>";
  echo "</thead>";
  echo "<tbody>";
foreach($array as $elemento){
  echo "<tr>";
  echo "<td  style='width:40%;'> <a href = 'controlador.php?cargarPartidaSeleccionada=".$elemento['nombre']."'>".$elemento['nombre']."</a></td>";
  echo "<td>".$elemento['usuario'];
      echo "<a href='controlador.php?delPartida=".$elemento['nombre']."'><i class='text-danger fa fa-trash' aria-hidden='true' style = ''></i>";
      ?>
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="width: 1.5%; margin-top: -12%; margin-left: 15%; position: absolute;">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
      </svg>
  <?php
      echo "</a>";
      echo "</td>";
  echo "</tr>";

}
echo "</tbdody>";

echo "</table>";
}

?>
</html>
