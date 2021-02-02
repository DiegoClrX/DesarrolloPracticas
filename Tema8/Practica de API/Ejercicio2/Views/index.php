<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body style='background: linear-gradient(135deg, #292929 0%,#2c2c2c 50%,#232323 50%,#232323 50%);  background-attachment: fixed; font-family: Roboto, sans-serif;'>
    <img src="img/logo.png" alt="logo" style="width: 50%; margin-left: 25%; position: absolute;">

    <input type="checkbox" id="menu-box" />
    <label for="menu-box" class="btn-menu"><i class="fa fa-bars"></i></label>

    <nav>
        <ul id="menu">
            <li style="list-style: none; "><a style="color: black; text-decoration: none;" href="#" id="accion">Accion</a></li>
            <li style="list-style: none; "><a style="color: black; text-decoration: none;" href="#" id="animacion">animacion</a></li>
            <li style="list-style: none; "><a style="color: black; text-decoration: none;" href="#" id="comedia">Comedia</a></li>
            <li style="list-style: none; "><a style="color: black; text-decoration: none;" href="#" id="terror">Terror</a></li>
            <li style="list-style: none; "><a style="color: black; text-decoration: none;" href="#" id="cienciaFiccion">Ciencia Ficcion</a></li>
        </ul>
    </nav>
    <div id="contenido"></div>

</body>
<script>
    // BOTON DE PELICULAS DE ACCION

    document.getElementById("accion").addEventListener("click", async function() {
        let formData = new FormData();

        formData.append("action", "serieAccion");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });

    //BOTON DE PELICULAS DE ANIMACION

    document.getElementById("animacion").addEventListener("click", async function() {
        let formData = new FormData();
        formData.append("action", "serieAnimacion");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });

    //BOTON DE PELICULAS DE COMEDIA

    document.getElementById("comedia").addEventListener("click", async function() {
        let formData = new FormData();
        formData.append("action", "serieComedia");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });

    //BOTON DE PELICULAS DE TERROR

    document.getElementById("terror").addEventListener("click", async function() {
        let formData = new FormData();
        formData.append("action", "serieTerror");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });

    //BOTON DE PELICULAS DE CIENCIA FICCION

    document.getElementById("cienciaFiccion").addEventListener("click", async function() {
        let formData = new FormData();
        formData.append("action", "serieCienciaFiccion");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });

    //BOTON VER PELICULA

    // document.getElementById("verSerie").addEventListener("click", async function(){
    //     let formData = new FormData();
    //     formData.append("action", "verSerie");

    //     let res = await fetch("../Controller/controlador.php", {
    //         method: "POST",
    //         body: formData,
    //     });

    //     let data = await res.text();

    //     document.getElementById("contenido").innerHTML = data;
    // });
    document.getElementById("verSerie").addEventListener("click", async function() {
        let formData = new FormData();

        formData.append("action", "vistaPelicula");

        let res = await fetch("../Controller/controlador.php", {
            method: "POST",
            body: formData,
        });

        let data = await res.text();

        document.getElementById("contenido").innerHTML = data;
    });
</script>

</html>