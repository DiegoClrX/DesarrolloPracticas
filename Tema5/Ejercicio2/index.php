<?php 
  include_once("controlador.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/titulo.css">
    <title>JUEGACIAM</title>
</head>

<body style="background-color: black;">
    <header>
        <h1 style="font-size: 50px;color:white; text-align: center; margin-top:5%">JUEGOS 2020</h1>
        <div id="container" style="margin-left: 23%; margin-top: 5%;">

            <p><a href='#'>Juegaciam</a></p>
            <button type="button" style="margin-top: 5%; margin-left: 43%;" class="btn btn-primary" data-toggle="modal" data-target="#registro" data-whatever="@getbootstrap" style="margin-left: 40%;" name="add">Registrarse</button>
            <button type="button" style="margin-left: 10%; margin-top: 5%;" class="btn btn-primary" data-toggle="modal" data-target="#iniciarSesion" data-whatever="@getbootstrap" style="margin-left: 40%;" name="add">Iniciar Sesion</button>
        </div>

    </header>

<!-- MODAL REGISTRO-->
<div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="controlador.php">
            <input type="text" name="usuarioRegistro" class="form-control" style=" margin-bottom:2%;" placeholder="Usuario" required>
            <input type="email" name="emailRegistro" class="form-control" style=" margin-bottom:2%;" placeholder="Email" required>
            <input type="password" name="contraseñaRegistro" class="form-control" style=" margin-bottom:2%;" placeholder="contraseña" required>
            <input type="password" name="confirmarContraseñaRegistro" class="form-control" placeholder="Repita la contraseña" required>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="registrarse">Registrarse</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- MODAL INICIAR SESION-->
<div class="modal fade" id="iniciarSesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="controlador.php">
            <input type="text" name="usuarioSesion" class="form-control" style=" margin-bottom:2%;" placeholder="Usuario" required>
            <input type="password" name="contraseñaSesion" class="form-control" style=" margin-bottom:2%;" placeholder="contraseña" required>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="iniciarSesion">Iniciar Sesion</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

</body>

</html>