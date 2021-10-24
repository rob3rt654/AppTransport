<?php

class Vehiculo
{

    private $id_vehiculo;
    private $color;
    private $placa;
    private $imagenes;
    private $cantidad_peso;
    private $cantidad_personas;
    private $id_tipo_vehiculo;

    public function __construct($id_vehiculo, $color, $placa, $imagenes, $cantidad_peso,$cantidad_personas,$id_tipo_vehiculo)
    {

        $this->id_vendedor = $id_vendedor;
        $this->color = $color;
        $this->placa = $placa;
        $this->imagenes = $imagenes;
        $this->cantidad_peso = $cantidad_peso;
        $this->cantidad_personas = $cantidad_personas;
        $this->id_tipo_vehiculo = $id_tipo_vehiculo;
        
    }


    public function getId_vehiculo()
    {
        return $this->id_vehiculo;
    }

    public function setId_vehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }
    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }


    public function getImagenes()
    {
        return $this->imagenes;
    }

    public function setImagenes($imagenes)
    {
        $this->imagenes = $imagenes;
    }
    public function getCantidad_peso()
    {
        return $this->cantidad_peso;
    }

    public function setCantidad_peso($cantidad_peso)
    {
        $this->cantidad_peso = $cantidad_peso;
    }

    public function getCantidad_personas()
    {
        return $this->cantidad_personas;
    }

    public function setCantidad_personas($cantidad_personas)
    {
        $this->cantidad_personas = $cantidad_personas;
    }

    public function getId_tipo_vehiculo()
    {
        return $this->id_tipo_vehiculo;
    }

    public function setId_tipo_vehiculo($id_tipo_vehiculo)
    {
        $this->id_tipo_vehiculo = $id_tipo_vehiculo;
    }
}

?>