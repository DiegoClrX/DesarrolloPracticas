<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Ver Solo una pelicula</title>
</head>

<body>

    <!-- GUARDAR TODO EN UNA SESION -->
    <div style='font-family: Roboto, sans-serif; height: 658; margin-top: 40%;'>
        <a href='index.php'><img src='img/flecha.png' alt='flecha volver' style='position:absolute; width:5%; margin-left: 40%; margin-top:6%'></a>

        <img src='https://image.tmdb.org/t/p/w500/<?php echo $_SESSION['pelicula']->poster_path ?>' alt='imagen de pelicula' style='width: 30%; margin-top:-7%; margin-left:2%; float: left; position:absolute;'>

        <div style='margin-left: 50%; margin-top: -30%'>
            <h1 style='color: #BDBDBD; font-size:70px; text-align: center; margin-left: -15%;'><?php echo $_SESSION['pelicula']->name ?></h1>

            <h1 style='color: #BDBDBD; margin-left:27%'>Description: </h1>
            <p style='color: #BDBDBD; margin-left:-8%; margin-right:5%; font-size:17px; text-align:center'><?php echo $_SESSION['pelicula']->overview ?></p>

            <div style='float:left; margin-left:-3%;'>
                <h1 style='color: #BDBDBD; margin-left:-8%'>Fecha Estreno: </h1>
                <p style='color: #BDBDBD; margin-left:-8%; font-size:20px; text-align:center'>'<?php echo $_SESSION['pelicula']->first_air_date ?></p>
            </div>

            <div style='float:left; margin-left: 30%;'>
                <h1 style='color: #BDBDBD; margin-left:-8%;'>Votos: </h1>
                <p style='color: #BDBDBD; margin-left:-8%; font-size:20px; text-align:center'><?php echo $_SESSION['pelicula']->vote_average ?></p>
            </div>

            <form action="../Controller/controlador.php" method="$_POST">
            <input type="hidden" name="idPelicula" <?php echo "value = '".$_SESSION['pelicula']->id."'" ?>>
                <button class='btn btn-primary' style='margin-left:15%; margin-top:5%;' name="verComentarios" id="verComentarios">Ver Comentarios</button>
                <button type="button"style = "margin-top:5%;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" id="enviar">Añadir Comentarios</button>
            </form>
        </div>
    </div>

    <!-- Modal Comentario -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/controlador.php" method="POST">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name = "usuario">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nota:</label>
                            <input type="text" class="form-control" id="nota" name="nota">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Comentario:</label>
                            <textarea class="form-control" name="comentario" id="comentario"></textarea>
                        </div>
                        <input type="hidden" name="idPelicula" <?php echo "value = '".$_SESSION['pelicula']->id."'"?>>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="enviar" name="enviar">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="contenido"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

<script>
document.getElementById('verComentarios').addEventListener('click', async function(){
    let formData = new FormData();
        formData.append("action", "verComentarios");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;

});
</script>

</html>