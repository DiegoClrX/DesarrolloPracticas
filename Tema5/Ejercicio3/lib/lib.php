<?php

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
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Función para filtrar los valores recibidos de un formulario
function filtrado($datos)
{
    $datos = trim($datos);                                  // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos);                          // Elimina backslashes \
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);     // Elimina todas las etiquetas    
    return $datos;
}




//########################################################
//                 Funciones para USUARIO
//#########################################################
/**
 * Añadir usuario
 */
function addUser($dni, $nombre, $apellidos, $poblacion, $telefono, $email)
{

    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "INSERT INTO usuariolibro (DNI, nombre, apellidos, poblacion, telefono, email ) VALUES (";
        $consulta .= ":DNI, :nombre, :apellidos, :poblacion, :telefono, :email)";

        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':DNI', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':poblacion', $poblacion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL, "es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
/**
 * Eliminar Usuario
 */

function delUser($dni)
{
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM usuariolibro WHERE DNI = :DNI";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':DNI', $dni);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

/**
 * Mostrar Todos los Usuarios
 */

function cargarUsuario()
{
    $usuarios = null;

    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Consulta de todos los usuarios
        $consulta = "SELECT * FROM usuariolibro";

        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);

        $stmt->execute();

        //Devolvemos los resultados
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }

    return $usuarios;
}

//########################################################
//                 Funciones para Libros
//#########################################################

function addBook($isbm, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $imagenPortada, $numEjemplaresTotales, $numEjemplaresDisponibles)
{

    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "INSERT INTO libros (ISBM, titulo, subtitulo, descripcion, autor, editorial, categoria, imagenPortada, numEjemplaresTotales, numEjemplaresDisponibles ) VALUES (";
        $consulta .= ":ISBM, :titulo, :subtitulo, :descripcion, :autor, :editorial, :categoria, :imagenPortada, :numEjemplaresTotales, :numEjemplaresDisponibles)";

        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':ISBM', $isbm);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':editorial', $editorial);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':imagenPortada', $imagenPortada);
        $stmt->bindParam(':numEjemplaresTotales', $numEjemplaresTotales);
        $stmt->bindParam(':numEjemplaresDisponibles', $numEjemplaresDisponibles);

        $stmt->execute();

        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL, "es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
/**
 * Eliminar Libros
 */

function delBook($isbm)
{
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM usuariolibro WHERE ISBM = :ISBM";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':ISBM', $isbm);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
/**
 * Edita los libros
 */

 function updateBook($isbm, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $imagenPortada, $numEjemplaresTotales, $numEjemplaresDisponibles){
    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "UPDATE usuariolibro ISBM = :ISBM, titulo = :titulo, subtitulo = :subtitulo, descripcion = :descripcion, autor = :categoria, editorial = :editorial, categoria = :categoria, imagenPortada = :imagenPortada, numEjemplaresTotales = :numEjemplaresTotales, numEjemplaresDisponibles = :numEjemplaresDisponibles ) WHERE ";
        $consulta .= "isbm = :isbm";

        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':ISBM', $isbm);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':nombre', $descripcion);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':editorial', $editorial);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':imagenPortada', $imagenPortada);
        $stmt->bindParam(':numEjemplaresTotales', $numEjemplaresTotales);
        $stmt->bindParam(':numEjemplaresDisponibles', $numEjemplaresDisponibles);

        $stmt->execute();

        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL, "es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
 }

/**
 * Mostrar Todos los Libros
 */

function cargarBook()
{
    $libros = null;

    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Consulta de todos los usuarios
        $consulta = "SELECT * FROM libros";

        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);

        $stmt->execute();

        //Devolvemos los resultados
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }

    return $libros;
}
    //########################################################
   //                Funciones para Prestamos
  //#########################################################
/**
 * añade un prestamo a la base de datos
 */
  function addPrestamo($isbm, $dni, $fechaInicio, $fechaFin, $estado)
{

    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "INSERT INTO prestamo (ISBM, DNI, fechaInicio, fechaFin, estado ) VALUES (";
        $consulta .= ":ISBM, :DNI, :fechaInicio, :fechaFin, :estado);";

        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':ISBM', $isbm);
        $stmt->bindParam(':DNI', $dni);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
        $stmt->bindParam(':estado', $estado);

        $stmt->execute();

        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL, "es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
/**
 * Borra el prestamo indicado
 */
function delPrestamo($id)
{
    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM prestamo WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
/**
 * Actualiza el prestamo indicado
 */
function updatePrestamo($id, $estado, $fechaFin){
    try {
        $conexion = conectar("practicas5");
        $conexion->query("SET NAMES utf8");

        //Preparamos la consulta
        $consulta = "UPDATE prestamo estado = :estado, fechaFin = :fechaFin WHERE ";
        $consulta .= "id = :id";

        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fechaFin', $fechaFin);

        $stmt->execute();

        $conexion = null;
    } catch (PDOException $e) {
        setlocale(LC_ALL, "es_ES");
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
 }
/**
 * Muestra todos los prestamos
 */
function cargarPrestamo()
{
    $prestamo = null;

    try {
        //Establecer conexión
        $conexion = conectar("practicas5");
        //Para evitar problemas con caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Consulta de todos los usuarios
        $consulta = "SELECT * FROM prestamo";

        //Preparamos la consulta
        $stmt = $conexion->prepare($consulta);

        $stmt->execute();

        //Devolvemos los resultados
        $prestamo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }

    return $prestamo;
}
  ?>