<?php
session_start();
if (!isset($_SESSION['user-agent']))
    $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
else {
    if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
        session_destroy();
}
  include_once("cookiesEjercicio4.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 4</title>
    <div style="width: 60%;">
    <h1 class="display-1" style="text-align: center;">Tus encuestas FAVORITAS </h1>
    </div>
</head>

<body>

    <!-- Seccion de Deportes -->
    <form method="POST">

        <h1 class="display-1" style="font-size: 50px; margin-left: 30%; margin-top: 3%; margin-bottom: 3%;">Deportes</h1>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="deportes" value="futbol">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Futbol" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="deportes" value="karate">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="karate" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="deportes" value="calistenia">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Calistenia" disabled>
        </div>
        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary" style="margin-left: 20%;">
    </form>

    <!-- Seccion de Coches -->
    <form method="POST">
        <h1 class="display-1" style="font-size: 50px; margin-left: 30%; margin-top: 3%; margin-bottom: 3%;">Coches</h1>
        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="coches" value="m4gts">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="BMW m4 gts" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="coches" value="r8">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Audi R8" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="coches" value="typeR">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Honda Civic Type R" disabled>
        </div>
        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary" style="margin-left: 20%;">
    </form>

    <!-- Seccion de Series -->
    <form method="POST">

        <h1 class="display-1" style="font-size: 50px; margin-left: 30%; margin-top: 3%; margin-bottom: 3%;">Series</h1>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="series" value="peaky">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Peaky Blinders" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="series" value="casaPapel">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="La casa de papel" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="series" value="cobraKai">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="cobra kai" disabled>
        </div>
        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary" style="margin-left: 20%;">
    </form>

    <!-- Seccion de Juegos -->
    <form method="POST">
        <h1 class="display-1" style="font-size: 50px; margin-left: 30%; margin-top: 3%; margin-bottom: 3%;">Juegos</h1>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="juegos" value="cod">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Call of Duty" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="juegos" value="csgo">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Counter Strike" disabled>
        </div>

        <div class="input-group mb-3" style="width: 30%; margin-left: 20%;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="juegos" value="uncharted">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Uncharted" disabled>
        </div>
        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary" style="margin-left: 20%; margin-bottom: 5%;">
    </form>



</body>

</html>