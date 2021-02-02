<?php
    namespace reservas;
    include_once("../autoload.php");
    use reservas\reservasDB;
    use reservas\VistaReservas;

    if(isset($_POST['action'])){

        if($_POST['action']=='verReservas'){
            $reservas = reservasDB::getReservas();
            VistaReservas::renderReservas($reservas);
        }

        if($_POST['action']=='deleteReserva'){
            echo
            reservasDB::deleteIncidencia($_POST['id']);
            $reservas = reservasDB::getReservas();
            VistaReservas::renderReservas($reservas);
        }
        
        
        if($_POST['action']=='updateReserva'){
            // reservasDB::updateReserva($_POST['id']);
            $reservas = reservasDB::getReservas();
            VistaReservas::renderReservas($reservas);
        }

        if($_POST['action']=='updateReserva'){
            print_r($_POST);
            reservasDB::updateReserva($_POST['id'], $_POST['fecha'],$_POST['hora'], $_POST['nComensales']);
            $reservas = reservasDB::getReservas();
            VistaReservas::renderReservas($reservas);
        }
    }

    if(isset($_POST['reservar'])){
        reservasDB::newReserva($_POST);
        header("location: ../Views/index.php");
    }






    /**
     * Funciones para crear un objeto de reserva
     */
    // function crearReserva($nombre, $apellidos, $email, $movil, $fecha, $hora, $estado){
    //     return new Reserva($nombre, $apellidos, $email, $movil, $fecha, $hora, $estado);
    // }
?>