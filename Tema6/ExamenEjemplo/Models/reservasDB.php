<?php

namespace reservas;
include_once("../autoload.php");
use reservas\Reserva;
use reservas\ConexionDB;
use \PDO;
use \PDOException;

class reservasDB {

    //Ver Reservas  
    public static function getReservas() {
        $consulta = "SELECT * FROM reservas";

        $conexion = ConexionDB::conectar("reservasguli");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            //$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "reservas\Reserva");
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "reservas\Reserva");
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;
    }

    //Agregar una reserva pasandole solo el post
    public static function newReserva($post) {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        $consulta = "INSERT INTO reservas (";
        foreach($post as $key => $value) {
            $consulta .= $key.", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ") VALUES (";
        foreach($post as $key => $value) {
            $consulta .= ":".$key.", ";
        }
        $consulta = substr($consulta, 0, -2); //Quitamos última coma y el espacio
        $consulta .= ");";

        $conexion = ConexionDB::conectar("reservasguli");

        try {
            $stmt = $conexion->prepare($consulta);

            foreach($post as $key => $value) {
                $param = ":".$key;
                $stmt->bindValue($param,$value); //Ojo aquí que es bindValue
            }

            $stmt->execute();
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar(); 
    }

    //Borrar Reserva
    public static function deleteIncidencia($id) {
        $consulta = "DELETE FROM reservas WHERE id=:id";
        $conexion = ConexionDB::conectar("reservasguli");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id",$id);
            $stmt->execute();            
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
    }

    //Update Reserva
    public static function updateReserva($fecha,$hora,$nComensales,$id) {
        $consulta = "UPDATE reservas SET fecha=:fecha, hora=:hora, nComensales=:nComensales WHERE id=:id";
        $conexion = ConexionDB::conectar("reservasguli");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":fecha",$fecha);
            $stmt->bindParam(":hora",$hora);
            $stmt->bindParam(":nComensales",$nComensales);
            $stmt->bindParam(":id",$id);
            $stmt->execute();            
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
    } 
    
}

?>