<?php
namespace seriesTV;

session_start();

include_once("autoload.php");

use seriesTV\comentariosDB;
use seriesTV\VistaPeliculas;
use seriesTV\VistaComentario;

if(isset($_POST['action'])){
//Ver Peliculas

    if($_POST['action'] == 'serieAccion'){
        $_SESSION['pelicula'] = array();
        $pelis = peliculasGenero(10759);
        VistaPeliculas::renderTodasPeliculas($pelis);
    }
    if($_POST['action'] == 'serieAnimacion'){
        $_SESSION['pelicula'] = array();
        $pelis = peliculasGenero(16);
        VistaPeliculas::renderTodasPeliculas($pelis);
    }
    if($_POST['action'] == 'serieComedia'){
        $_SESSION['pelicula'] = array();
        $pelis = peliculasGenero(35);
        VistaPeliculas::renderTodasPeliculas($pelis);
    }
    if($_POST['action'] == 'serieTerror'){
        $_SESSION['pelicula'] = array();
        $pelis = peliculasGenero(9648);
        VistaPeliculas::renderTodasPeliculas($pelis);
    }
    if($_POST['action'] == 'serieCienciaFiccion'){
        $_SESSION['pelicula'] = array();
        $pelis = peliculasGenero(10765);
        VistaPeliculas::renderTodasPeliculas($pelis);
    }
    if($_POST['action'] == 'verComentarios'){
        // VistaComentario::renderComentarios(comentariosDB::getIncidencias($_SESSION['pelicula']->id));
        // VistaComentario::renderComentarios(comentariosDB::getComents($_SESSION['pelicula']->id));
    }
    
}


//Pruebas
echo $_SESSION['pelicula']->id;
echo "<br>";
// print_r(comentariosDB::getComents($_SESSION['pelicula']->id));
print_r(comentariosDB::getComents(77169));
// print_r(comentariosDB::getOne($_SESSION['pelicula']->id));
echo "<br>";
$comentarios = comentariosDB::getAll();
print_r($comentarios);
$comentarios[0]['id'];


if(isset($_GET['verSerie'])){
    echo $_GET['idSerie'];
    $_SESSION['pelicula'] = peliculaSola($_GET['idSerie']);
    header("location: ../Views/VistaSoloPelicula.php");
}


//COMENTARIOS
if(isset($_POST['enviar'])){
    comentariosDB::insertComent($_POST['idPelicula'], $_POST['usuario'], $_POST['nota'], $_POST['comentario']);
    header("location: ../Views/VistaSoloPelicula.php");
 
 }
//  if(isset($_POST['verComentarios'])){
//      $result = comentariosDB::getComents($_POST['idPelicula']);
//      VistaComentario::renderComentarios($result);
//  }

//FUNCIONES
function peliculasGenero($id){
			$json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=85c8b862f042e9f8b3c587d1403e30d9&language=en-US&sort_by=popularity.desc&page=1&timezone=America%2FNew_York&include_null_first_air_dates=false&with_genres=".$id);
            $pelis = json_decode($json);
            return $pelis;
}

    // SELECCIONA SOLO UNA PELICULA
function peliculaSola($id)
    {
        $json = file_get_contents("https://api.themoviedb.org/3/tv/" . $id . "?api_key=85c8b862f042e9f8b3c587d1403e30d9&language=en-US");
        $peli = json_decode($json);
        return $peli;
    }

?>