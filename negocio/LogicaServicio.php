<?php

include '../datos/datosServicio.php';

class LogicaServicio
{

    private $datosServicio;

    public function __construct()
    {
        $this->datosServicio = new datosServicio();
    }

    public function insertar($terminos_condiciones, $nombre_servicio, $id_tipo_servicio, $id_vehiculo)
    {
        return $this->datosServicio->insertar($terminos_condiciones, $nombre_servicio, $id_tipo_servicio, $id_vehiculo);
    }

    public function consultar()
    {

        return $this->datosServicio->consultar();
    }
    public function actualizar($servicio)
    {

        return $this->datosServicio->actualizar($servicio);
    }
    public function eliminar($id)
    {

        return $this->datosServicio->eliminar($id);
    }

}
