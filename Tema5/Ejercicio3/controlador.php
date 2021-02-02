<?php

session_start();
include_once("lib/lib.php");

use League\Csv\Writer;
//########################################################
//                 Funciones para USUARIO
//#########################################################

if (!isset($_SESSION['listaUsuario'])) {
    $_SESSION['listaUsuario'] = array();
}

if (isset($_POST['addUser'])) {
    addUser($_POST['dni'], $_POST['nombreUsuario'], $_POST['apellidosUsuario'], $_POST['poblacion'], $_POST['telefono'], $_POST['email']);
    $_SESSION['listaUsuario'] = cargarUsuario();
    header("location: usuarios.php");
}

if (isset($_GET['delUser'])) {
    delUser($_GET['delUser']);
    $_SESSION['listaUsuario'] = cargarUsuario();
    header("location: usuarios.php");
}


//########################################################
//                 Funciones para Libro
//#########################################################
if (!isset($_SESSION['listaLibros'])) {
    $_SESSION['listaLibros'] = array();
}

if (isset($_POST['addBook'])) {
    addBook($_POST['isbm'], $_POST['titulo'], $_POST['subtitulo'], $_POST['descripcion'], $_POST['autor'], $_POST['categoria'], $_POST['editorial'], $_POST['imagen'], $_POST['ejemplaresTotales'], $_POST['ejemplaresDisponibles']);
    $_SESSION['listaLibros'] = cargarBook();
    header("location: libros.php");
}

if (isset($_GET['delBook'])) {
    delBook($_GET['delBook']);
    $_SESSION['listaLibros'] = cargarBook();
    header("location: libros.php");
}

if (isset($_GET['confirmarEdit'])) {
    updateBook($_GET['editBook'], $_GET['titulo'], $_GET['subtitulo'], $_GET['descripcion'], $_GET['autor'], $_GET['categoria'], $_GET['editorial'], $_GET['imagen'], $_GET['ejemplaresTotales'], $_GET['ejemplaresDisponibles']);
    $_SESSION['listaUsuario'] = cargarBook();
    header("location: libros.php");
}

/**
 * CSV
 */
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'csvLibros') {
        $_SESSION['listaLibros'] = cargarBook();
        //we fetch the info from a DB using a PDO object
        $sth = $dbh->prepare(
            "SELECT * FROM libros"
        );
        //because we don't want to duplicate the data for each row
        // PDO::FETCH_NUM could also have been used
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        //we create the CSV into memory
        //$csv = Writer::createFromFileObject(new SplTempFileObject());

        //we insert the CSV header
        $csv->insertOne(['ISBM', 'titulo', 'subtitulo', 'descripcion', 'autor', 'categoria', 'editorial', 'imagen', 'ejemplaresTotales', 'ejemplaresDisponibles']);

        // The PDOStatement Object implements the Traversable Interface
        // that's why Writer::insertAll can directly insert
        // the data into the CSV
        $csv->insertAll($sth);

        // Because you are providing the filename you don't have to
        // set the HTTP headers Writer::output can
        // directly set them for you
        // The file is downloadable
        $csv->output('users.csv');
        die;
    }
}


function buscadorLibros($array,$nombre)
{
    echo "<table class = 'table' style = 'margin-top:-35%; width:70%; margin-left:27%; position:absolute; text-align: center;'>";
    echo "<thead class = 'thead-dark' style='margin-left:500%; background-color:black;'>";
    echo "<th scope='col'>Titulo</th>";
    echo "<th scope='col'>Subtitulo</th>";
    echo "<th scope='col'>Autor</th>";
    echo "<th scope='col'>Editorial</th>";
    echo "<th scope='col'>Categoria</th>";
    echo "<th scope='col'>Imagen</th>";
    echo "<th scope='col'>Ejemplares Totales</th>";
    echo "<th scope='col'>Ejemplares Disponibles</th>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($array as $elemento) {
       if($nombre == $elemento['titulo'] || $nombre == $elemento['subtitulo'] || $nombre == $elemento['autor']){
        echo "<tr style>";
        echo "<td>" . $elemento['titulo'] . "</td>";
        echo "<td>" . $elemento['subtitulo'] . "</td>";
        echo "<td>" . $elemento['autor'] . "</td>";
        echo "<td>" . $elemento['editorial'] . "</td>";
        echo "<td>" . $elemento['categoria'] . "</td>";
        echo "<td>" . $elemento['imgPortada'] . "</td>";
        echo "<td>" . $elemento['numEjemplaresTotales'] . "</td>";
        echo "<td>" . $elemento['numEjemplaresDisponibles'] . "</td>";
        echo "<td>";
        echo "<a href='controlador.php?delBook=" . $elemento['ISBM'] . "'><i class='text-danger fa fa-trash' aria-hidden='true' style = ''></i>";
        echo "<img src = 'img/delete.png' alt='delete' style='width:2%; position:absolute;'>";
        echo "</a>";
        echo "</td>";
        echo "<td>";
        echo "<a data-toggle='modal' data-target='#editBook' data-whatever='@getbootstrap' href='controlador.php?editBook=" . $elemento['ISBM'] . "''><i class='text-danger fa fa-trash' aria-hidden='true' style = ''></i>";
        echo "<img src = 'img/editar.png' alt='delete' style='width:2%; position:absolute;'>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
       }else{
           echo "<script>Libro no encontrado</script>";
       }
    }
    echo "</tbdody>";

    echo "</table>";
}

//########################################################
//                 Funciones para Prestamo
//#########################################################
if (!isset($_SESSION['listaPrestamo'])) {
    $_SESSION['listaPrestamo'] = array();
}

if(isset($_POST['addPrestamo'])){
    addPrestamo($_POST['isbm'], $_POST['dni'],$_POST['fechaInicio'],$_POST['fechaFin'], $_POST['estado']);
    $_SESSION['listaPrestamo'] = cargarPrestamo();
    header("location: prestamos.php");
}

if (isset($_GET['delPrestamo'])) {
    delPrestamo($_GET['delPrestamo']);
    $_SESSION['listaPrestamo'] = cargarPrestamo();
    header("location: prestamos.php");
}

if (isset($_GET['editPrestamo'])) {
    updatePrestamo($_GET['updatePrestamo'], $_GET['estado'], $_GET['fechaFin']);
    $_SESSION['listaPrestamo'] = cargarPrestamo();
    header("location: prestamos.php");
}

?>