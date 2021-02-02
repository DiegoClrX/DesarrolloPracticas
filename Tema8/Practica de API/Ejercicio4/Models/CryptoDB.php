<?php

namespace Monedas;
use MongoDB\Client;
use Monedas\ConexionDB;
use \Exception;

class CryptoDB {

    //Obtienes todas las monedas
    public static function getAll() {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");
            $cursor = $conexion->monedas->find();
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            echo $e;
        }
        $conexion = null;
        return $result;
    }

//Modifica una moneda preguntar 
    public static function getOne($id) {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");
            $monedas = $conexion->monedas->findOne(['id' => intval($id)]);
            if ($monedas == null) {
            } else { 
                $result = json_encode($monedas);
            }            
        } catch(Exception $e) {
            echo $e;
        }            
        $conexion = null;
        return $result;
    }

//Sube un 0.1% al valor de la moneda 
    public static function upValue($id) {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");

            $cursor = $conexion->Incidencias->updateOne(
                ['id' => intval($id)],
                ['$set' =>  [ 'valor_24h' * 0.1 ]
                ]
            );
        
        } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;       
    }   

//Baja un 0.1% al valor de la moneda 
    public static function downValue($id) {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");

            $cursor = $conexion->Incidencias->updateOne(
                ['id' => intval($id)],
                ['$set' =>  [ 'valor_24h' / 0.1 ]
                ]
            );
        
        } catch(Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;       
    }   
    
//Crea una nueva moneda POST

public static function newCoinPOST() {

    try {
        $conexion = ConexionDB::conectar("cryptoMonedas");

        //Primero sacamos el máximo id
        $monedas = $conexion->monedas->findOne(
            [],
            [
                'sort' => ['id' => -1],
            ]);
        if (isset($monedas['id']))
            $max = $monedas['id'] + 1;
        else 
            $max = 1;

        $result = $conexion->monedas->insertOne([
            'nombre' => $_POST["nombre"],
            'simbolo' => $_POST["simbolo"],
            'descripcion' => $_POST["descripcion"],
            'precio' => $_POST["precio"],
            'valor_24h' => $_POST["valor_24h"],
            'id' => $max
        ]);

      } catch(Exception $e) {
      }
      $conexion = null;
      return $result;
}

//Las 10 primeras monedas en orden de precio

public static function viewTeenCoin(){
    try {
        $conexion = ConexionDB::conectar("cryptoMonedas");
        $cursor = $conexion->monedas->find();
        $result = json_encode($cursor->toArray());
    } catch(Exception $e) {
        echo $e;
    }
    $conexion = null;
    return $result;
}

//Muestra en formato Json la moneda con el id dado

public static function getjson($id) {
    try {
        $conexion = ConexionDB::conectar("cryptoMonedas");
        $monedas = $conexion->monedas->findOne(['id' => intval($id)]);
        if ($monedas == null) {
        } else { 
            $result = json_decode($monedas);
        }            
    } catch(Exception $e) {
        echo $e;
    }            
    $conexion = null;
    return $result;
}

//borra la criptomoneda con ese id

    public static function deleteOne($id) {
        try {
            $conexion = ConexionDB::conectar("cryptoMonedas");
            $cursor = $conexion->monedas->deleteOne(array('id' => intval($id)));  
            
        } catch(Exception $e) {
            echo $e;
        }
        $conexion = null;
        // return $result;
    }


}

?>