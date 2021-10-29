<?php

include '../datos/datosTipoServicio.php';

class LogicaTipoServicio
{

    private $datosTipoServicio;

    public function __construct()
    {
        $this->datosTipoServicio = new datosTipoServicio();
    }
    public function consultar()
    {

        return $this->datosTipoServicio->consultar();
    }

}
