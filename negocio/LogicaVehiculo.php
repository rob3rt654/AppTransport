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

    public function consultariban($id)
    {
        return $this->datos->consultariban($id);
    }

    public function consultarUltimo()
    {
        return $this->datos->consultarUltimo();
    }
    public function actualizar($vehiculo,$id)
    {

        return $this->datos->actualizar($vehiculo,$id);
    }

    public function actualizarcuenta($cuenta,$id)
    {

        return $this->datos->actualizarcuenta($cuenta,$id);
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
