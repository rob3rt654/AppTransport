<?php

include '../datos/datosVendedor.php';

class LogicaVendedor
{

    private $datosVendedor;

    public function __construct()
    {
        $this->datosVendedor = new datosVendedor();
    }

    public function insertar($administrador)
    {

        return $this->datosAdministrador->insertar($administrador);
    }

    public function consultar()
    {

        return $this->datosAdministrador->consultar();
    }
    public function actualizar($administrador)
    {

        return $this->datosAdministrador->actualizar($administrador);
    }
    public function eliminar($id)
    {

        return $this->datosAdministrador->eliminar($id);
    }

    public function verificarVendedor($correo,$contrasena)
    {

        return $this->datosVendedor->verificarVendedor($correo,$contrasena);
    }
    public function verificarAdmiWS($correo,$contrasena)
    {

        return $this->datosAdministrador->verificarAdmiWS($correo,$contrasena);
    }
}
