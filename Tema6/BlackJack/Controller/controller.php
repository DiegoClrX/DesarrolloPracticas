<?php


session_start();
include_once("autoload.php");

use blackJack\partida;
use blackJack\vistaPartida;
use blackJack\VistaGanador;

if(!isset($_SESSION['partida'])){
    $partida = new partida();
    $_SESSION['partida'] = serialize($partida);
}

/**
 * PARTE DE PARTIDA
 */

if(isset($_POST['action'])){
    
    if($_POST['action']=='jugar'){   
        $partida = new partida();
        $partida->repartirCartasAJugadores();
        VistaPartida::renderPartida($partida);
        $_SESSION['partida'] = serialize($partida);
    }

    if($_POST['action']=='plantarse'){
        $partida = unserialize($_SESSION['partida']);

            $carta =  $partida->getBaraja()->repartirCartas();
            $partida->getCrupier()->nuevaCarta($carta);        

        VistaGanador::renderGanador($partida);
        $_SESSION['partida'] = serialize($partida);
    }

    if($_POST['action']=="addCarta"){
        $partida = unserialize($_SESSION['partida']);
        $carta =  $partida->getBaraja()->repartirCartas();
        $partida->getJugador()->nuevaCarta($carta);
        
        VistaPartida::renderPartida($partida);
        $_SESSION['partida'] = serialize($partida);
    }
}

//VALOR JUGADOR
$valorJugador = $partida->getJugador()->valorMano();

if($valorJugador > 21){
    $partida = unserialize($_SESSION['partida']);
    $_SESSION['partida'] = array();
    vistaGanador::renderGanador($partida);
    $_SESSION['partida'] = serialize($partida);
}

if($valorJugador == 21){
    $partida = unserialize($_SESSION['partida']);
    $_SESSION['partida'] = array();
    vistaGanador::renderGanador($partida);
    $_SESSION['partida'] = serialize($partida);
}

$valorCrupier = $partida->getCrupier()->valorMano();

if($valorCrupier > 21){
    $partida = unserialize($_SESSION['partida']);
    $_SESSION['partida'] = array();
    vistaGanador::renderGanador($partida);
    $_SESSION['partida'] = serialize($partida);
}

?>