<?php
namespace Songs;
use MongoDB\Client;
USE Exception;
require 'vendor/autoload.php';

class ConexionDB {

    private static $conexion;

    public static function conectar($database,$host="mongodb://localhost:27017",$user="admin",$password="admin") {
        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            // $host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
            self::$conexion = (new Client($host))->{$database};
        } catch (Exception $e){
            echo $e->getMessage();
        }

        return self::$conexion;
    }

    public static function desconectar() {
        self::$conexion = null;
    }

}


header('Content-Type: application/json');
$conexion = ConexionDB::conectar("songs");
$cursor = $conexion->songs->find();
$result = json_encode($cursor->toArray());
echo $result;