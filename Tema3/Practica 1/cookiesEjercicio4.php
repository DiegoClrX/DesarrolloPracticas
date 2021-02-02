<?php
if (isset($_POST['deportes'])) {;
    $deportes = $_POST['deportes'];
    echo "<div style = ' margin-left: 70%; margin-bottom: -15%; margin-top: 5%; float: right;'>";
    echo "<h2 class 'display-2'> Publicidad </h2>";
    echo "<img src='imagenes4/deportes/$deportes.jpg' alt'error' style = 'width: 80% ;'>";
    echo "</div>";
    setcookie("deportes", $deportes, time() + 846.000);
}
if (isset($_POST['coches'])) {;
    $coches = $_POST['coches'];
    echo "<div style = ' margin-left: 70%; margin-bottom: -15%; margin-top: 5%; float: right;'>";
    echo "<h2 class 'display-2'> Publicidad </h2>";
    echo "<img src='imagenes4/coches/$coches.jpg' alt'error' style = 'width: 80% ;'>";
    echo "</div>";
    setcookie("coches", $coches, time() + 846.000);
}
if (isset($_POST['series'])) {;
    $series = $_POST['series'];
    echo "<div style = ' margin-left: 70%; margin-bottom: -15%; margin-top: 5%; float: right;'>";
    echo "<h2 class 'display-2'> Publicidad </h2>";
    echo "<img src='imagenes4/series/$series.jpg' alt'error' style = 'width: 80% ;'>";
    echo "</div>";
    setcookie("series", $series, time() + 846.000);
}
if (isset($_POST['juegos'])) {;
    $juegos = $_POST['juegos'];
    echo "<div style = ' width: 30%; margin-left: 70%; margin-bottom: -15%; margin-top: 10%; float: right;''>";
    echo "<h2 class 'display-2'> Publicidad </h2>";
    echo "<img src='imagenes4/juegos/$juegos.jpg' alt'error' style = 'width: 100% ;'>";
    echo "</div>";
    setcookie("juegos", $juegos, time() + 846.000);
}

?>