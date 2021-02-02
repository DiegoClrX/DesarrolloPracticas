<?php
    namespace blackJack;

    class Carta{
        public $palo;
        public $figura;

        function __construct($palo, $figura)
        {
            $this->palo = $palo;
            $this->figura = $figura;
        }

        function __toString()
        {
            return $this->palo.$this->figura;
        }

        /**
         * Get the value of palo
         */ 
        public function getPalo()
        {
                return $this->palo;
        }

        /**
         * Set the value of palo
         *
         * @return  self
         */ 
        public function setPalo($palo)
        {
                $this->palo = $palo;

                return $this;
        }

        /**
         * Get the value of figura
         */ 
        public function getFigura()
        {
                return $this->figura;
        }

        /**
         * Set the value of figura
         *
         * @return  self
         */ 
        public function setFigura($figura)
        {
                $this->figura = $figura;

                return $this;
        }

        /**
         * Devuelve el calor de la carta
         */
        public function valorMano(){
            switch($this->figura){
                case 'A':
                    return 11;
                break;
                case 'K':
                    return 10;
                break;
                case 'Q':
                    return 10;
                break;
                case 'J':
                    return 10;
                break;
                case '9':
                    return 9;
                break;
                case '8':
                    return 8;
                break;
                case '7':
                    return 7;
                break;
                case '6':
                    return 6;
                break;
                case '5':
                    return 5;
                break;
                case '4':
                    return 4;
                break;
                case '3':
                    return 3;
                break;
                case '2':
                    return 2;
                break;
                
            }
        }
    }

?>