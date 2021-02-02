<?php

namespace blackJack;
include_once("../Controller/autoload.php");
use blackJack\barajaInglesa;
use blackJack\jugador;
use blackJack\Carta;


class partida
{
    private $jugador;
    private $crupier;
    private $baraja;

    function __construct(){
        $this->jugador = new jugador();
        $this->crupier = new jugador();
        $this->baraja = new barajaInglesa();
    }

    /**
     * Verifica que llegue a 21 o que ninguno se pase de 21 
     * @return boolean
     */

    function verificaBlackJack()
    {
        if ($this->jugador->valorMano() == 21 || $this->crupier->valorMano() == 21) {
            return true;
        }
    }

    /**
     * Cartas crupier si sumas 17 o + no se le entrega carta
     * @return boolean
     */
    function cartasCrupier()
    {
        if ($this->crupier->valorMano() > 17) {
            return true;
        }
    }


    /**
     * Reparte las cartas a los dos jugadores
     */
    function repartirCartasAJugadores()
    {
        $this->crupier->nuevaCarta($this->baraja->repartirCartas());
        for ($i = 0; $i < 2; $i++) {
            $this->jugador->nuevaCarta($this->baraja->repartirCartas());
        }
    }

    /**
     * Get the value of jugador
     */ 
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Get the value of crupier
     */ 
    public function getCrupier()
    {
        return $this->crupier;
    }

    /**
     * Get the value of baraja
     */ 
    public function getBaraja()
    {
        return $this->baraja;
    }
}
?>