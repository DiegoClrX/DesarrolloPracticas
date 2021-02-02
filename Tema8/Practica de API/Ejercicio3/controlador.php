<?php
session_start();

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'animesPopulares') {
        populares();
    }
}

if(isset($_GET['verAnime'])){
        // $_SESSION['id'] = $_GET['idAnime'];
        // header("location: verAnime.php");
        visualizarAnime($_GET['idAnime']);
    
}

function populares()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://kitsu.io/api/edge/trending/anime");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);
    visualizacion($result);
}


function visualizacion($animes)
{

    foreach ($animes->data as $anime) {
        echo "<div class = 'anime' style = 'width:20%; float:left; margin-left:-1%; margin-top:5%; margin-right:1%; padding:1%'>";
        echo "<img src='" . $anime->attributes->posterImage->small . "' alt = 'Portada del anime'>";
        echo "<h2>" . $anime->attributes->slug . "</h2>";
        echo "<p> Ranking: " . $anime->attributes->averageRating . "</p>";
        echo "<p>Fecha Estreno: " . $anime->attributes->startDate . "</p>";

        echo "<form action='controlador.php' method = 'GET'>";
        echo "<input type = 'hidden' id = 'idAnime'  name = 'idAnime' value = '".$anime->id."'>";
        echo "<input type = 'submit' id = 'verAnime' name = 'verAnime' value = 'Ver Mas'>";
        echo "</form>";

        echo "</div>";
    }
}

function visualizarAnime($id)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://kitsu.io/api/edge/anime/".$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);
    vistaAnime($result);
}

function vistaAnime($animes)
{
    echo "<div style = 'background-image: url(img/anime2.jpg); height :640px'>";
    echo "<img src = '".$animes->data->attributes->posterImage->medium."' style = 'float:left; margin-top: 3%'>";
    echo "<a href = 'anime.php'>";
    echo "<img src='img/flecha.png' style='position:absolute; width:5%; margin-left 2%; margin-top:7%'>";
    echo "</a>";
    echo "<div style = 'background: rgba(0, 0, 0, 0.5); padding:5%; height :500px'>";
    echo "<h1 style = 'font-size:50px; color:#44FA00; text-align: center; margin-left:10%'>".$animes->data->attributes->titles->en."</h1>";
    echo "<p style = 'color:white'>".$animes->data->attributes->synopsis."</p>";
    echo "<h3 style = 'color:white'> Fecha de Estreno: ".$animes->data->attributes->startDate."</h3>";
    echo "<h3 style = 'color:white'> Edad Recomendada: ".$animes->data->attributes->ageRatingGuide."</h3>";
    echo "<h3 style = 'color:white'> Estado del Anime: ".$animes->data->attributes->status."</h3>";
    echo "<h3 style = 'color:white'> Ranking Popular: ".$animes->data->attributes->popularityRank."</h3>";
    echo "</div>";
    echo "</div>";
}


?>