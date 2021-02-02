<?php

namespace blackJack;
use blackJack\Carta;

class jugador{
    private $mano;
    
    function __construct(){
        $this->mano = array();
    }

    /**
    * Añade una carta a la mano del jugador
     */
    function nuevaCarta($carta){
        // array_push($this->mano, $carta);
        $this->mano[] = $carta;
    }

    function __toString(){
        foreach($this->mano as $carta){
            echo "<img src = '../cards/".$carta->__toString().".png' width = '5%' alt = 'error'>";
        }
    }

    /**
     * Calcula la suma de las cartas que tiene en la mano
     */
    function valorMano(){
        $valorMano = 0;
        foreach($this->mano as $carta){
            $valorMano += $carta->valorMano();
        }
        return $valorMano;
    }


    /**
     * Get the value of mano
     */ 
    public function getMano()
    {
        return $this->mano;
    }
}
?>