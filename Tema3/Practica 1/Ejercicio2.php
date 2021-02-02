<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 2</title>
</head>

<body>
    <div style="margin: 2%;">
        <h1 class="display-1" style="font-size: 40px; margin-left: 15%;">Bienvenido a la votacion de asignaturas</h1>
        <h2 class="display-4" style="font-size: 40px; margin-left: 15%;">Tendras que votar a la asignatura que mas te guste</h2>
        <form action="" method="post">

            <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="votacion" value="servidor">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Desarrollo web en entorno servidor ">
            </div>

            <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="votacion" value="cliente">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Desarrollo web en entorno cliente ">
            </div>

            <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="votacion" value="interfaces">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Diseño de interfaces Web">
            </div>

            <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="votacion" value="despliegue">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Despliegue de aplicaciones web">
            </div>

            <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="votacion" value="libre">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Libre Configuracion">
            </div>

            <input type="submit" value="Enviar" class="btn btn-primary" style="margin-left: 20%;">
            <input type="reset" value="Resetear" class="btn btn-primary" style="margin-left: 20%;">



        </form>
        <?php

        session_start();
        if (!isset($_SESSION['user-agent'])) {
            $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['contServ'] = 0;
            $_SESSION['contClien'] = 0;
            $_SESSION['contDespli'] = 0;
            $_SESSION['contInterf'] = 0;
            $_SESSION['contLibre'] = 0;
        } else {
            if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
                session_destroy();
        }

        if ($_POST) {
            if (($_POST['votacion'] == 'libre')) {
                if (!isset($_SESSION['contLibre'])) {
                    $_SESSION['contLibre'] = 1;
                } else {
                    $_SESSION['contLibre']++;
                }
            }

            if (($_POST['votacion'] == 'cliente')) {
                if (!isset($_SESSION['contClien'])) {
                    $_SESSION['contClien'] = 1;
                } else {
                    $_SESSION['contClien']++;
                }
            }

            if ($_POST['votacion'] == 'servidor') {
                if (!isset($_SESSION['contServ'])) {
                    $_SESSION['contServ'] = 1;
                } else {
                    $_SESSION['contServ']++;
                }
            }

            if ($_POST['votacion'] == 'interfaces') {
                if (!isset($_SESSION['contInterf'])) {
                    $_SESSION['contInterf'] = 1;
                } else {
                    $_SESSION['contInterf']++;
                }
            }

            if ($_POST['votacion'] == 'despliegue') {
                if (!isset($_SESSION['contDespli'])) {
                    $_SESSION['contDespli'] = 1;
                } else {
                    $_SESSION['contDespli']++;
                }
            }
        }

        echo "<h1 class = 'Display-1' style = 'margin-left:20%; margin-top:5%;'> Resultado de la votacion actualmente </h1>";
        echo "<h3 class = 'Display-3' style = 'margin-left:20%;'> Servidor lleva -->" . $_SESSION['contServ'] . "</h1>";
        echo "<h3 class = 'Display-3' style = 'margin-left:20%;'> Cliente lleva -->" . $_SESSION['contClien'] . "</h1>";
        echo "<h3 class = 'Display-3' style = 'margin-left:20%;'> Interfaces lleva -->" . $_SESSION['contInterf'] . "</h1>";
        echo "<h3 class = 'Display-3' style = 'margin-left:20%;'> Despliegue lleva -->" . $_SESSION['contDespli'] . "</h1>";
        echo "<h3 class = 'Display-3' style = 'margin-left:20%;'> Libre Configuracion lleva -->" . $_SESSION['contLibre'] . "</h1>";
        ?>
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><?php $_SESSION['contServ']?></div>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php $_SESSION['contClien']?></div>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php $_SESSION['contInterf']?></div>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php $_SESSION['contDespli']?></div>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php $_SESSION['contLibre']?></div>
        </div>
    </div>
</body>

</html>