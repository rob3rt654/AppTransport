<?php

include '../datos/datosVehiculo.php';

class LogicaVehiculo
{

    private $datos;

    public function __construct()
    {
        $this->datos = new datosVehiculo();
    }

    public function insertar($vehiculo)
    {

        return $this->datos->insertar($vehiculo);
    }

    public function consultar($id)
    {
        return $this->datos->consultar($id);
    }
    public function actualizar($vehiculo)
    {

        return $this->datos->actualizar($vehiculo);
    }
    public function eliminar($id)
    {

        return $this->datos->eliminar($id);
    }

    public function verificarVendedor($correo,$contrasena)
    {

        return $this->datos->verificarVendedor($correo,$contrasena);
    }
    
}
