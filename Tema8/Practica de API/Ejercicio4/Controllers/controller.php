<?php
namespace Monedas;
include_once("../autoload.php");
use Monedas\ConexionDB;
use Monedas\CryptoDB;

class Controller{

    private $method;

    public function __construct()
    {
        $this->method = "";
    }

    public function handle_base($method) {
        $this->method = $method;
        
        switch($method){
            // case 'PUT':
            //     $this->create_coin();
            //     break;
            case 'POST':
                $this->create_coin_post();
                break;
            case 'GET':
                $this->teen_coins();  
                break;         
        }
    }

    
        /**
         * viewCoins: la url lleva "criptoc", se muestran las 50 primeras monedas
         */
        public function viewCoins($method) {
            if ($method == "GET") {
                header("Content-Type: application/json; charset=UTF-8");
                echo CryptoDB::getAll(); 
            } else {
                header('HTTP/1.1 404 Not Found');
            }
        }

        /**
         * PREGUNTAR
         * viewCoin: la url lleva "id", espera un id de la moneda que quiere mostrar
         */
        public function viewCoin($method,$id) {
            if ($method == "PUT") {
                header("Content-Type: application/json; charset=UTF-8");
                echo CryptoDB::getOne($id);
            } else {
                header('HTTP/1.1 404 Not Found');
            }
        }

        /**
         * Show_by_genre: la url lleva "up", se muestran las canciones por género
         */
        public function upCoin($method, $id) {
            if ($method == "PUT") {
                header("Content-Type: application/json; charset=UTF-8");
                echo CryptoDB::upValue($id); 
            } else {
                header('HTTP/1.1 404 Not Found');
            }            
        }
        /**
         * Show_by_genre: la url lleva "down", se muestran las canciones por género
         */
        public function downCoin($method, $id) {
            if ($method == "PUT") {
                header("Content-Type: application/json; charset=UTF-8");
                echo CryptoDB::downValue($id); 
            } else {
                header('HTTP/1.1 404 Not Found');
            }            
        }

        /**
         * Handle_id: la url lleva "id", se realizan acciones GET,PUT,DELETE por id de las monedas
         */
        public function handle_id($method, $id) {
            $this->method = $method;
            switch($method){
                case 'DELETE':
                    $this->delete_coin($id);
                    break;
                case 'GET':
                    $this->display_coin($id);
                    break;
                default:
                    header('HTTP/1.1 405 Method not allowed');
                    header('Allow: GET, PUT, DELETE');
                    break;
            }            
        }

        /**
         * teen_coins: muestra las 10 canciones ordenadas
         */
        public function teen_coins() {
            header("Content-Type: application/json; charset=UTF-8");
            echo CryptoDB::viewTeenCoin();          
        }

        /**
         * Create_moneda_post: crea una nueva las monedas por POST, requiere request
         */
        public function create_coin_post() {
            header("Content-Type: application/json; charset=UTF-8");
            echo CryptoDB::newCoinPOST(); 
        }

        /**
         * Delete_coin: borra las monedas por id
         */
        public function delete_coin($id) {
            header("Content-Type: application/json; charset=UTF-8");
            echo CryptoDB::deleteOne($id);
        }

        /**
         * Display_coin: muestra la las monedas de ese id
         */
        public function display_coin($id) {
            header("Content-Type: application/json; charset=UTF-8");
            echo CryptoDB::getjson($id);
        }

} 
?>