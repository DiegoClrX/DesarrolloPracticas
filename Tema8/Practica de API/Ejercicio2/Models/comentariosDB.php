<?php
namespace seriesTV;

use Exception;
use seriesTV\ConexionDB;

class comentariosDB{

    //Insertar Comentarios
  public static function insertComent($id, $usuario, $nota, $comentario){
    try{
        $conexion = ConexionDB::conectar("SeriesDB");

        $result = $conexion->comentarios->insertOne([
            'id'=>$id,
            'usuario'=>$usuario,
            'nota'=>$nota,
            'comentario'=>$comentario
        ]);

        $result->status_message = "Created 1 document \n";
        $result->success = true;
        $result->status_code = 1;
        $result = json_encode($result);

    }catch(Exception $e){
        $result = 'Error'.$e->getMessage();
    }
    ConexionDB::desconectar();
    return $result;
  }

  //Ver Comentarios

  public static function getComents($id){
    try {
      $conexion = ConexionDB::conectar("SeriesDB");
      $cursor = $conexion->comentarios->find(array('id' => $id));
      $result = json_encode($cursor->toArray());
  } catch(Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }
  $conexion = null;
  return $result;
  }

  public static function getAll() {
    try {
        $conexion = ConexionDB::conectar("SeriesDB");
        $cursor = $conexion->comentarios->find();
        $result = json_encode($cursor->toArray());
    } catch(Exception $e) {
    }
    $conexion = null;
    return $result;
}
  


public static function getOne($id) {
  try {
    $conexion = ConexionDB::conectar("SeriesDB");
    $cursor = $conexion->comentarios->find();
    $result = json_encode($cursor->toArray());
} catch(Exception $e) {
}
$conexion = null;
return $result;
}


  public static function getIncidencias($id) {
    try {
        $conexion = ConexionDB::conectar("SeriesDB");
        $cursor = $conexion->comentarios->find(array('id'=>$id));
        $result = array();
        foreach ($cursor as $doc) {
            $result[] = array('id'=>$doc['id'], 'usuario'=>$doc['usuario'],'nota' => $doc['nota'], 'comentario' => $doc['comentario']);
        }
  
    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
    $conexion = null;
    return $result;
  }
}

?>