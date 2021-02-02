<?php
    include_once("../Controller/controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>BlackJack By Diego</title>
</head>
<body style="background:url('images/inicio.jpg') no-repeat top center">
<header>

<div id="centrar">
<h1 style="color: black;"><img src="images/poker.png" alt="" width="7%"> Bienvenido BlackJack <img src="images/poker.png" alt="" width="7%"></h1>
</div>
</header>
    <div style="margin-left: 35%; margin-top: 30%;"> 
        <button type="button" class = "btn btn-primary" style="margin-right: 5%; width: 20%;" data-toggle="modal" data-target="#registro" data-whatever="@getbootstrap"> <img src="images/registro.png" alt="" width="15%"> Registrarse</button>
        <button type="button" class = "btn btn-primary" data-toggle="modal" data-target="#iniciarSesion" data-whatever="@getbootstrap" style="width: 20%;"> <img src="images/usuario.png" alt="" width="15%"> Iniciar Sesion</button>
    </div>

    
<!-- MODAL REGISTRO-->
<div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="../Controller/controller.php">
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
      <form method="POST" action="../Controller/controller.php">
            <input type="text" name="usuarioSesion" class="form-control" style=" margin-bottom:2%;" placeholder="Usuario" required>
            <input type="password" name="contraseñaSesion" class="form-control" style=" margin-bottom:2%;" placeholder="contraseña" required>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="iniciarSesion">Jugar!</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>
<?php
//header("location: Views/tablero.php");
?>
</body>
</html>