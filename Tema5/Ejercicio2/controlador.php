<?php
session_start();
include_once("lib/lib.php");

if (!isset($_SESSION['usuarioSesion'])) {
    $_SESSION['usuarioSesion'] = array();
}
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "";
}

if (!isset($_SESSION['partida'])) {
    $_SESSION['partida'] = array();
}
if (!isset($_SESSION['nombrePartida'])) {
    $_SESSION['nombrePartida'] = "";
}


/**
 * Inicio de sesion 
 * @method metodo para que busque si el usuario y la contraseña coinciden
 * @param $_POST['usuarioSesion'] y $_POST['contraseñaSesion']
 */
if (isset($_POST['iniciarSesion'])) {
    $usuarios = devuelveUsuarios();

    filtrado($_POST['usuarioSesion']);
    filtrado($_POST['contraseña']);
    foreach ($usuarios as $usuario) {
        if ($usuario['usuario'] == $_POST['usuarioSesion'] && $usuario['contraseña'] == $_POST['contraseñaSesion']) {
            $_SESSION['usuario'] = $_POST['usuarioSesion'];
            header("location: optionGame.php");
        } else {
            echo "<script>alert('El usuario o la contraseña son erroneos')</script>";
        }
    }
}

/**
 * Registro de sesion
 * @method metodo para que incluya en la base de datos los datos de sesion del usuario
 * @param $_POST['usuarioRegistro'] $_POST['contraseñaRegistro'] y $_POST['emailRegistro']
 */

if (isset($_POST['registrarse'])) {
    
    if($partida['contraseñaRegistro'] == $_POST['confirmarContraseñaRegistro']){

        registro($_POST['usuarioRegistro'], $_POST['contraseñaRegistro'], $_POST['emailRegistro']);
    }else{
        echo "<script>alert('Las contraseñas no coinciden')</script>";
}
    header("location: index.php");
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'guardarPartida') {
        guardarPartida($_SESSION['nombrePartida'], $_SESSION['edificios']['templos'] ,$_SESSION['edificios']['cuarteles'],$_SESSION['edificios']['aserraderos'],$_SESSION['edificios']['canteras'],$_SESSION['edificios']['huertos'],$_SESSION['edificios']['mercados'],$_SESSION['suministros']['oro'],$_SESSION['suministros']['madera'],$_SESSION['suministros']['madera'],$_SESSION['suministros']['comida']);
        header("location: juegaCiam.php");
    }

    if ($_GET['action'] == 'cargarPartida') {
        $_SESSION['partida'] = cargarPartida($_SESSION['usuario']);
        header("location: optionGame.php");
    }

    if ($_GET['action'] == 'cerrarSesion') {
        $_SESSION['usuario'] = "";
        $_SESSION['partida'] = array();
        header("location: index.php");
    }
}

/**
 * 
 */
if (isset($_GET['cargarPartidaSeleccionada'])) {
    $_SESSION['partida'] = cargarPartida($_SESSION['usuario']);

    foreach ($_SESSION['partida'] as $partida) {

        if ($partida['nombre'] == $_GET['cargarPartidaSeleccionada'] && $partida['usuario'] == $_SESSION['usuario']) {
            $_SESSION['suministros']['oro'] = $partida['oro'];
            $_SESSION['suministros']['madera'] = $partida['madera'];
            $_SESSION['suministros']['comida'] = $partida['comida'];
            $_SESSION['suministros']['marmol'] = $partida['marmol'];


            $_SESSION['edificios']['cuarteles'] = $partida['cuarteles'];
            $_SESSION['edificios']['templos'] = $partida['templos'];

            $_SESSION['edificios']['aserraderos'] = $partida['aserraderos'];
            $_SESSION['edificios']['canteras'] = $partida['canteras'];
            $_SESSION['edificios']['huertos'] = $partida['huertos'];
            $_SESSION['edificios']['mercados'] = $partida['mercados'];
        }
    }

    header("location: juegaciam.php");
}

/* OPTION GAME */
/**
 * 
 */
if (isset($_POST['crearPartida'])) {

    $_SESSION['suministros']['oro'] = 2000;
    $_SESSION['suministros']['madera'] = 2000;
    $_SESSION['suministros']['comida'] = 2000;
    $_SESSION['suministros']['marmol'] = 2000;


    $_SESSION['edificios']['cuarteles'] = 0;
    $_SESSION['edificios']['templos'] = 0;

    $_SESSION['edificios']['aserraderos'] = 0;
    $_SESSION['edificios']['canteras'] = 0;
    $_SESSION['edificios']['huertos'] = 0;
    $_SESSION['edificios']['mercados'] = 0;

    nuevaPartida($_POST['nombrePartida'], $_SESSION['usuario'], $_SESSION['edificios']['templos'], $_SESSION['edificios']['cuarteles'], $_SESSION['edificios']['aserraderos'], $_SESSION['edificios']['canteras'], $_SESSION['edificios']['huertos'], $_SESSION['edificios']['mercados'], $_SESSION['suministros']['oro'], $_SESSION['suministros']['madera'], $_SESSION['suministros']['marmol'], $_SESSION['suministros']['comida']);
    $_SESSION['nombrePartida'] = $_POST['nombrePartida'];
    header("location: juegaciam.php");
}
?>