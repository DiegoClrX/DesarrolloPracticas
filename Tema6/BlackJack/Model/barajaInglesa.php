<?php

namespace blackJack;

use blackJack\Baraja;
use blackJack\Carta;


//use BarajaAbs;

    class barajaInglesa extends baraja{
        static $palos = array('C', 'D', 'P', 'T'); 
        static $figuras = array('2','3','4','5','6','7','8','9','J','Q','K','A');

        function __construct(){
            parent::__construct($this->generarMazo());
            
        }

        function repartirCartas(){

            $mazo = parent::barajarCartas(); 
            $carta = array_pop($mazo);
            parent::setMazo($mazo);
            return $carta;   
           
        }

        function generarMazo(){
            $mazo = array();
            foreach (self::$palos as $palo) {
                foreach (self::$figuras as $figura) {
                    $carta = new Carta($palo, $figura);
                    $mazo[] = $carta;
                }
            }
            return $mazo;  
        }

        public function __toString(){
            foreach($this->mazo as $carta){
                echo $carta;
            }
        }

    }
?>