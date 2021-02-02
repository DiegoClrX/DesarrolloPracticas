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
    <title>Prestamos</title>
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
            <h1 class="display-1">Prestamos</h1>
            <form action="controlador.php" method="post">
                <input type="text" name="buscarPrestamo" id="" placeholder="DNI o estado"> 
               <button type="submit" style="border:0px solid black; position: absolute; margin-left: 2%; background-color:white; width: 10%;"> <img src="img/buscar.png" style="width: 20%;" alt=""></button>
            </form>
            <a href="#">
                <button type="button" data-toggle="modal" data-target="#addPrestamo" data-whatever="@getbootstrap" style="background-color: white; border:0px solid; width: 20%; height: 30px; margin-left: 85%;"><img src="img/añadirUsuario.png" alt="" style="width: 20%;"></button>
            </a>
        </section>
    </div>



    <!-- MODAL ADD  USERS-->
    <div class="modal fade" id="addPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Añadir Prestamo</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" action="controlador.php">
                        <input type="number" name="isbm" class="form-control" style=" margin-bottom:2%;" placeholder="ISBM" required>
                        <input type="text" name="dni" class="form-control" style=" margin-bottom:2%;" placeholder="dni cliente" required>
                        <input type="date" name="fechaInicio" class="form-control" style=" margin-bottom:2%;" placeholder="Fecha inicio" required>
                        <input type="date" name="fechaFin" class="form-control" style=" margin-bottom:2%;" placeholder="Fecha expiracion" required>
                        <select name="estado" class="form-control">
                            <option value="activo">activo</option>
                            <option value="devuelto">devuelto</option>
                            <option value="sobrepasado1Mes">sobrepasado1Mes</option>
                            <option value="sobrepasado1Año">sobrepasado1Año</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addPrestamo">Crear</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT PRESTAMO-->
    <div class="modal fade" id="editPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Editar Prestamo</h5>

                </div>
                <div class="modal-body">
                    <form method="GET" action="controlador.php">
                        <input type="date" name="fechaFin" class="form-control" style=" margin-bottom:2%;" placeholder="Fecha expiracion">
                        <select name="estado" class="form-control">
                            <option value="activo">activo</option>
                            <option value="devuelto">devuelto</option>
                            <option value="sobrepasado1Mes">sobrepasado1Mes</option>
                            <option value="sobrepasado1Año">sobrepasado1Año</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="editPrestamo">Editar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="del">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    mostrarPrestamo($_SESSION['listaPrestamo']);
    function mostrarPrestamo($array)
    {
        echo "<table class = 'table' style = 'margin-top:-25%; width:70%; margin-left:27%; position:absolute; text-align: center;'>";
        echo "<thead class = 'thead-dark' style='margin-left:500%; background-color:black;'>";
        echo "<th scope='col'>ISBM</th>";
        echo "<th scope='col'>DNI</th>";
        echo "<th scope='col'>Fecha Inicio</th>";
        echo "<th scope='col'>Fecha Fin</th>";
        echo "<th scope='col'>Estado</th>";
        echo "<th scope='col'></th>";
        echo "<th scope='col'></th>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($array as $elemento) {
            echo "<tr style>";
            echo "<td>" . $elemento['ISBM'] . "</td>";
            echo "<td>" . $elemento['DNI'] . "</td>";
            echo "<td>" . $elemento['fechaInicio'] . "</td>";
            echo "<td>" . $elemento['fechaFin'] . "</td>";
            echo "<td>" . $elemento['estado'] . "</td>";
            echo "<td>";
            echo "<a href='controlador.php?delPrestamo=" . $elemento['id'] . "'><i class='text-danger fa fa-trash' aria-hidden='true' style = ''></i>";
            echo "<img src = 'img/delete.png' alt='delete' style='width:2%; position:absolute;'>";
            echo "</a>";
            echo "</td>";
            echo "<td>";
            echo "<a data-toggle='modal' data-target='#editPrestamo' data-whatever='@getbootstrap' href='controlador.php?updatePrestamo=" . $elemento['id'] . "'><i class='text-danger fa fa-trash' aria-hidden='true' style = ''></i>";
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