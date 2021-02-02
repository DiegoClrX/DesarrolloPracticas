<?php

include_once("controlador.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Libreria</title>
</head>

<body>
    <div id="container">
        <header>
            <div style="background-color: black; color: gray; height: 80px;">
                <p style="float: left; font-size: 25px; margin-left: 3%; margin-top: 1%;">library</p>
                <img src="img/library.png" alt="" style="float: left; margin-top: 2%; margin-left: 1%;">
                <p style="margin-left: 60%; margin-right:5%; margin-top: 1%; padding: 1%; float: left;">EVIL NAPSIS administrador</p>
            </div>

            <!--Menu-->
            <div style="background-color: black; color: gray; margin-top: -5%; width: 25%; height: 588px;" id="menu" class="nav flex-column nav-pills">
                <ul>
                    <a href="index.php" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/inicio.png" width="7%" alt=""> Inicio</a>
                    <a href="prestamos.php" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/prestamo.png" width="7%" alt=""> Prestamos</a>
                    <a href="libros.php" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/libro.png" width="7%" alt=""> Libros</a>
                    <a href="usuarios.php" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/usuario.png" width="7%" alt=""> Clientes</a>
                    <a href="usuarios.php" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/usuarios.png" width="7%" alt=""> Usuarios</a>
                    <a href="#" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/mostrar.png" width="7%" alt=""> Categoria</a>
                    <a href="#" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/mostrar.png" width="7%" alt=""> Editoriales</a>
                    <a href="#" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/mostrar.png" width="7%" alt=""> Autores</a>
                    <a href="#" class="nav-link" style="font-size: 20px; color: gray; padding: 5%;"><img src="img/reportes.png" width="7%" alt=""> Reportes</a>
                </ul>
            </div>
        </header>
        <section style="margin-left: 50%; margin-top:-40%; float: left;">
            <h1 class="display-1">Libros</h1>
            
            <form action="controlador.php" method="post">
                <input type="text" name="buscarPrestamo" id="" placeholder="titulo, subtitulo, autor"> 
               <button type="submit" style="border:0px solid black; position: absolute; margin-left: 2%; background-color:white; width: 10%;"> <img src="img/buscar.png" style="width: 20%;" alt=""></button>
            </form>
            <a href="#">
                <button type="button" data-toggle="modal" data-target="#addBook" data-whatever="@getbootstrap" style="background-color: white; border:0px solid; width: 20%; height: 30px; margin-left: 85%;"><img src="img/añadirUsuario.png" alt="" style="width: 20%;"></button>
            </a>
            <!--
            <a href="controlador.php?action=csvLibro">
                <button type="button" data-toggle="modal" data-target="#editBook" data-whatever="@getbootstrap" style="background-color: white; border:0px solid; width: 20%; height: 30px; margin-left: 70%;"><img src="img/añadirUsuario.png" alt="" style="width: 20%;"></button>
            </a>-->
        </section>
    </div>



    <!-- MODAL ADD BOOK-->
    <div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Libro</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" action="controlador.php">
                        <input type="number" name="isbm" class="form-control" style=" margin-bottom:2%;" placeholder="ISBM" required>
                        <input type="text" name="titulo" class="form-control" style=" margin-bottom:2%;" placeholder="Titulo" required>
                        <input type="text" name="subtitulo" class="form-control" style=" margin-bottom:2%;" placeholder="Subtitulo" required>
                        <input type="text" name="descripcion" class="form-control" style=" margin-bottom:2%;" placeholder="descripcion" required>
                        <input type="text" name="autor" class="form-control" style=" margin-bottom:2%;" placeholder="Autor" required>
                        <input type="text" name="editorial" class="form-control" style=" margin-bottom:2%;" placeholder="Editorial" required>
                        <input type="text" name="categoria" class="form-control" style=" margin-bottom:2%;" placeholder="categiria" required>
                        <input type="file" name="imagen" class="form-control" style=" margin-bottom:2%;" placeholder="imagen de la portada" required>
                        <input type="number" name="ejemplaresTotales" class="form-control" style=" margin-bottom:2%;" placeholder="numero de ejemplares TOTALES" required>
                        <input type="number" name="ejemplaresDisponibles" class="form-control" style=" margin-bottom:2%;" placeholder="numero de ejemplares DISPONIBLES" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addBook">Crear</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT BOOK-->
    <div class="modal fade" id="editBook" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Editar Libro</h5>

                </div>
                <div class="modal-body">
                    <form method="GET" action="controlador.php">
                        <input type="text" name="titulo" class="form-control" style=" margin-bottom:2%;" placeholder="Titulo" required>
                        <input type="text" name="subtitulo" class="form-control" style=" margin-bottom:2%;" placeholder="Subtitulo" required>
                        <input type="text" name="descripcion" class="form-control" style=" margin-bottom:2%;" placeholder="descripcion" required>
                        <input type="text" name="autor" class="form-control" style=" margin-bottom:2%;" placeholder="Autor" required>
                        <input type="text" name="editorial" class="form-control" style=" margin-bottom:2%;" placeholder="Editorial" required>
                        <input type="text" name="categoria" class="form-control" style=" margin-bottom:2%;" placeholder="categiria" required>
                        <input type="file" name="imagen" class="form-control" style=" margin-bottom:2%;" placeholder="imagen de la portada" required>
                        <input type="number" name="ejemplaresTotales" class="form-control" style=" margin-bottom:2%;" placeholder="numero de ejemplares TOTALES" required>
                        <input type="number" name="ejemplaresDisponibles" class="form-control" style=" margin-bottom:2%;" placeholder="numero de ejemplares DISPONIBLES" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="confirmarEdit">Crear</button>
</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    mostrarLibros($_SESSION['listaLibros']);
    function mostrarLibros($array)
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
        }
        echo "</tbdody>";

        echo "</table>";
    }
    ?>
</body>

</html>