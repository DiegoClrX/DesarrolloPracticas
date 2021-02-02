<?php

namespace reservas;

class Reserva{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $movil;
    private $fecha;
    private $hora;
    private $estado;
    private $nComensales;
    static $maxComensales = 30;

    /**
     * Constructor
     */
    public function __construct($id = 0, $nombre = "", $apellidos = "", $email = "", $movil = 0, $fecha = "", $hora = 0, $estado = "", $nComensales = 0){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->movil = $movil;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->estado = $estado;
        $this->nComensales = $nComensales;
    }

    public function __toString()
    {
        echo "La reserva esta a nombre de ".$this->nombre." con apellidos ".$this->apellidos.", su email es ".$this->email." su numero de telefono es ".$this->movil." la fecha de la reserva es  ".$this->fecha." su hora es ".$this->hora." el estado de la reserva es ".$this->estado." el numero de comesales a esa hora es de ".$this->nComensales;
    }

    



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of movil
     */ 
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set the value of movil
     *
     * @return  self
     */ 
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of nComensales
     */ 
    public function getNComensales()
    {
        return $this->nComensales;
    }

    /**
     * Set the value of nComensales
     *
     * @return  self
     */ 
    public function setNComensales($nComensales)
    {
        $this->nComensales = $nComensales;

        return $this;
    }
}

?>