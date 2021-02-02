<?php

namespace blackJack;

abstract class Baraja{
    public $mazo;

    //Constructor
    public function __construct($mazo = array())
    {
        $this->mazo = $mazo; 
    }

    abstract function repartirCartas();

    /**
     * Desordena la baraja de cartas
     */
    function barajarCartas(){
        shuffle($this->mazo);
        return $this->mazo;
    }

    //Solo para ver las cartas no se usa en la aplicacion
    function listar(){
       foreach($this->mazo as $carta){
        echo "<img src='../cards/" . $carta . ".png' width='7%' alt='" . $carta . "'>";
       }
    }


    /**
     * Set the value of mazo
     *
     * @return  self
     */ 
    public function setMazo($mazo)
    {
        $this->mazo = $mazo;

        return $this;
    }

        /**
         * Get the value of mazo
         */ 
        public function getMazo()
        {
                return $this->mazo;
        }
}

?>