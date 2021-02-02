<?php 

//FILTRADO 

//Función para filtrar los valores recibidos de un formulario
function filtrado($datos){
    $datos = trim($datos);                                  // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos);                          // Elimina backslashes \
    $datos = filter_var($datos,FILTER_SANITIZE_STRING);     // Elimina todas las etiquetas    
    return $datos;
} 

 function conectar($basededatos) {
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

//Funciones Gestor Tareas
function addTarea( $nombre, $descripcion, $fecha, $prioridad){
    try{
    //Nos conectamos a la base de datos
    $conexion = conectar("practicas5");
    $conexion->query("SET NAMES utf8");
    
    $consulta = "INSERT INTO tareas (nombre, descripcion, fecha, prioridad) VALUES "; 
    $consulta .= "(:nombre, :descripcion, :fecha, :prioridad)";
    
    $stmt = $conexion->prepare($consulta);
    
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':prioridad', $prioridad);
    
    $stmt->execute();
    $conexion = null;
 } catch (PDOException $e){
    file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delTarea($id){
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM tareas WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e){
        file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delTodasTarea(){
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Preparamos la consulta
        $consulta = "DELETE FROM tareas";
        $stmt = $conexion->prepare($consulta);

        $stmt->execute();
        $conexion = null;

    } catch (PDOException $e){
        file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}  

function devuelveTareas(){
    $tareas = null;

        try {
            //Establecer conexión
            $conexion = conectar("practicas5");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");            
            //Consulta de todos los tareas
            $consulta = "SELECT * FROM tareas";

            //Preparamos la consulta
            $stmt = $conexion->prepare($consulta);

            //Ejecutamos la consulta
            $stmt->execute();

            //Devolvemos los resultados
            $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

        return $tareas;
}

?>