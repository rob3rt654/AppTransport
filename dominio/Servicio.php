<?php

class Servicio
{

    private $id_servicio;
    private $terminos_condiciones;
    private $estimacion_costo;
    private $nombre_servicio;
    private $id_cliente;
    private $id_vendedor;
    private $id_vehiculo;
    private $id_factura;

    public function __construct($id_servicio, $terminos_condiciones, $estimacion_costo, $nombre_servicio, $id_cliente, $id_vendedor, $id_tipo_servicio, $id_vehiculo, $id_factura)
    {

        $this->id_servicio = $id_servicio;
        $this->terminos_condiciones = $terminos_condiciones;
        $this->estimacion_costo = $estimacion_costo;
        $this->nombre_servicio = $nombre_servicio;
        $this->id_cliente = $id_cliente;
        $this->id_vendedor = $id_vendedor;
        $this->id_tipo_servicio = $id_tipo_servicio;
        $this->id_vehiculo = $id_vehiculo;
        $this->id_factura = $id_factura;

    }


    public function getId_servicio()
    {
        return $this->id_servicio;
    }

    public function setId_servicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }
    public function getTerminos_condiciones()
    {
        return $this->terminos_condiciones;
    }

    public function setTerminos_condiciones($terminos_condiciones)
    {
        $this->terminos_condiciones = $terminos_condiciones;
    }
    public function getEstimacion_costo()
    {
        return $this->estimacion_costo;
    }

    public function setEstimacion_costo($estimacion_costo)
    {
        $this->estimacion_costo = $estimacion_costo;
    }


    public function getNombre_servicio()
    {
        return $this->nombre_servicio;
    }

    public function setNombre_servicio($nombre_servicio)
    {
        $this->nombre_servicio = $nombre_servicio;
    }
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function getId_vendedor()
    {
        return $this->id_vendedor;
    }

    public function setId_vendedor($id_vendedor)
    {
        $this->id_vendedor = $id_vendedor;
    }
    public function getId_tipo_servicio()
    {
        return $this->id_tipo_servicio;
    }

    public function setId_tipo_servicio($id_tipo_servicio)
    {
        $this->id_tipo_servicio = $id_tipo_servicio;
    }
    public function getId_vehiculo()
    {
        return $this->id_vehiculo;
    }

    public function setId_vehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }
    public function getId_factura()
    {
        return $this->id_factura;
    }

    public function setId_factura($id_factura)
    {
        $this->id_factura = $id_factura;
    }
}

?>