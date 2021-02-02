<?php
namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use \Exception;

class IncidenciaDB {

    //Ver incidencias
    public static function getIncidencias() {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->incidencias->find();
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            echo "Error al mostrar todos las incidencias";
        }
        $conexion = null;
        return $result;
    }

    //Insertar incidencia
    public static function insertInc($post) {
        try {
            $conexion = ConexionDB::conectar("incidencias");

            //La única forma de leer PUT en PHP
            $put = file_get_contents( 'php://input', 'r' );
    
            //Primero sacamos el máximo id
            $song = $conexion->incidencias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($song['id']))
                $max = $song['id'] + 1;
            else 
                $max = 1;

            $result = $conexion->incidencias->insertOne([
                'id' => $max,
                'nombre' => $post['nombre'],
                'direccion' => $post["direccion"],
                'localidad' => $post["localidad"],
                'movil' => $post["movil"],
                'dni' => $post["dni"]
            ]);

          } catch(Exception $e) {
              echo $e->getMessage();
          }
          $conexion = null;
          return $result;
    }

    //Borrar incidencia
    public static function deleteIncidencia($id) {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->deleteOne(array('id' => intval($id)));  
            
        } catch(Exception $e) {
            echo $e;
        }
        $conexion = null;
    }
    

    //Update incidencia
    public static function updateIncidencia($estado,$id) {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");

            $cursor = $conexion->Incidencias->updateOne(
                ['id' => intval($id)],
                ['$set' =>  [ 'estado' => $estado]
                ]
            );
        
        } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;     
    } 

}
