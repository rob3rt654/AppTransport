<?php


class datosTipoServicio
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }


  function consultar()
  {

    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT * FROM tipo_servicios";
    $resultado = mysqli_query($crearConexion,$consulta);
    $tipo_servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($tipo_servicios, $result);
    }

    return json_encode($tipo_servicios);
    $crearConexion->close();
  }
 
}
