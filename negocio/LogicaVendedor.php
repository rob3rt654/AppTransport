<?php

include '../datos/datosVendedor.php';

class LogicaVendedor
{

    private $datosVendedor;

    public function __construct()
    {
        $this->datosVendedor = new datosVendedor();
    }

    public function insertar($vendedor)
    {

        return $this->datosVendedor->insertar($vendedor);
    }

    public function consultar()
    {

        return $this->datosVendedor->consultar();
    }
    public function actualizar($vendedor)
    {

        return $this->datosVendedor->actualizar($vendedor);
    }
    public function eliminar($id)
    {

        return $this->datosVendedor->eliminar($id);
    }

    public function verificarVendedor($correo,$contrasena)
    {

        return $this->datosVendedor->verificarVendedor($correo,$contrasena);
    }
    public function verificarAdmiWS($correo,$contrasena)
    {

        return $this->datosVendedor->verificarAdmiWS($correo,$contrasena);
    }
}
