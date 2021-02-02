<?php

namespace Incidencias;

use Incidencias\Cliente;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;
use \Exception;

class ClienteDB
{

    // ######################################
    // INSERTAR CON MONGODB
    // ###################################### 

    public static function newCliente($post){
        try {
            $conexion = ConexionDB::conectar("incidencias");
    
            //Primero sacamos el máximo id
            $cliente = $conexion->cliente->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($cliente['id']))
                $max = $cliente['id'] + 1;
            else 
                $max = 1;

            $result = $conexion->cliente->insertOne([
                'id' => $max,
                'nomber' => $post['nombre'],
                'direccion' => $post["direccion"],
                'localidad' => $post["localidad"],
                'movil' => $post["movil"],
                'dni' => $post["dni"]
            ]);

          } catch(Exception $e) {
              echo "error en la base de datos";
          }
          $conexion = null;
          return $result;
    }

    // ######################################
    // OBTENER LAS ID CON MONGODB
    // ###################################### 

    public static function getId($id) {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->find(array('id' => $id));
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            echo "error en la base de datos";

        }
        $conexion = null;
        return $result;
    } 

    // ######################################
    // OBTENER TODOS LOS CLIENTES CON MONGODB
    // ###################################### 
    public static function getClientes()
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->find();
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            echo "Error al mostrar todos los clientes";
        }
        $conexion = null;
        return $result;
    }



    //Borrar cliente
    public static function deleteCliente($id)
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->deleteOne(array('id' => intval($id)));  
            
        } catch(Exception $e) {
            echo $e;
        }
        $conexion = null;
    }

}


?>