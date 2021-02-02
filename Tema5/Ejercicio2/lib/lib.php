<?php

//FILTRADO 

//Función para filtrar los valores recibidos de un formulario


/**
 * Metodo que siver para conectarnos en la base de datos
 * @method al introducirle la base de datos esta se conecta con los parametros establecidos en la funcion
 * @param $basededatos
 */

function conectar($basededatos)
{
      //CONECTAR EN LOCAL

      $MySQL_host = "localhost";
      $MySQL_user = "root";
      $MySQL_password = "";
      try {
          $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
          $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conexion;
      } catch (PDOException $e){
          echo $e->getMessage();
      }
}

 //Función para filtrar los valores recibidos de un formulario
 function filtrado($datos){
    $datos = trim($datos);                                  // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos);                          // Elimina backslashes \
    $datos = filter_var($datos,FILTER_SANITIZE_STRING);     // Elimina todas las etiquetas    
    return $datos;
} 

function devuelveUsuarios()
{
    $usuarios = null;

    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");            
        //Consulta de todos los usuarios
        $consulta = "SELECT * FROM usuarios";

        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);

        //Ejecutamos la consulta
        $stmt->execute();

        //Devolvemos los resultados
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e){
        file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
    }

    return $usuarios;
}

function registro($usuario, $contraseña, $email)
{
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "INSERT INTO usuarios (usuario,contraseña,email) VALUES (";
        $consulta .= ":usuario, :contrasena, :email)";
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasena', $contraseña);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL,"es_ES");
        echo $e->getMessage();
        //file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function guardarPartida($nombre, $templos, $cuarteles, $aserraderos, $canteras, $huertos, $mercados, $oro, $madera, $marmol, $comida)
{
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "UPDATE partida SET templos = :templos, cuarteles = :cuarteles, aserraderos = :aserraderos, canteras = :canteras, huertos = :huertos, mercados = :mercados, oro = :oro, madera = :madera, marmol = :marmol, comida = :comida WHERE ";
        $consulta .= "nombre = :nombre";

        $stmt = $conexion->prepare($consulta);

        //$stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':templos', $templos);
        $stmt->bindParam(':cuarteles', $cuarteles);
        $stmt->bindParam(':aserraderos', $aserraderos);
        $stmt->bindParam(':canteras', $canteras);
        $stmt->bindParam(':huertos', $huertos);
        $stmt->bindParam(':mercados', $mercados);
        $stmt->bindParam(':oro', $oro);
        $stmt->bindParam(':madera', $madera);
        $stmt->bindParam(':marmol', $marmol);
        $stmt->bindParam(':comida', $comida);

        $stmt->execute();

        $conexion = null;
        
    } catch (PDOException $e) {
        setlocale(LC_ALL,"es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function cargarPartida($usuario)
{
    $partidas = null;

    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");            
        //Consulta de todos los partidas
        $consulta = "SELECT * FROM partida WHERE usuario = :usuario";

        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':usuario', $usuario);

        //Ejecutamos la consulta

        $stmt->execute();

        //Devolvemos los resultados
        $partidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e){
        file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
    }

    return $partidas;

}

function nuevaPartida($nombre, $usuario, $templos, $cuarteles, $aserraderos, $canteras, $huertos, $mercados, $oro, $madera, $marmol, $comida){
    
    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "INSERT INTO partida (nombre,usuario,templos,cuarteles,aserraderos,canteras,huertos,mercados,oro,madera,marmol,comida) VALUES (";
        $consulta .= ":nombre, :usuario, :templos, :cuarteles, :aserraderos, :canteras, :huertos, :mercados, :oro, :madera, :marmol, :comida)";
        
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':templos', $templos);
        $stmt->bindParam(':cuarteles', $cuarteles);
        $stmt->bindParam(':aserraderos', $aserraderos);
        $stmt->bindParam(':canteras', $canteras);
        $stmt->bindParam(':huertos', $huertos);
        $stmt->bindParam(':mercados', $mercados);
        $stmt->bindParam(':oro', $oro);
        $stmt->bindParam(':madera', $madera);
        $stmt->bindParam(':marmol', $marmol);
        $stmt->bindParam(':comida', $comida);

        $stmt->execute();

        $conexion = null;
        
    } catch (PDOException $e) {
        setlocale(LC_ALL,"es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }

}
