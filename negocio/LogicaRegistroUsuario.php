<?php

include '../datos/datosPersona.php';

class LogicaRegistroUsuario
{

    private $datos;

    public function __construct()
    {
        $this->datos = new datosPersona();
    }

    public function insertar($persona)
    {

        return $this->datos->insertar($persona);
    }

   
    
}
