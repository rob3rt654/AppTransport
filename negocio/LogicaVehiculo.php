<?php

include '../datos/datosVehiculo.php';

class LogicaVehiculo
{

    private $datos;

    public function __construct()
    {
        $this->datos = new datosVehiculo();
    }

    public function insertar($vehiculo,$vendedor)
    {

        return $this->datos->insertar($vehiculo,$vendedor);
    }

    public function consultar($id)
    {
        return $this->datos->consultar($id);
    }
    public function actualizar($vehiculo,$id)
    {

        return $this->datos->actualizar($vehiculo,$id);
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
