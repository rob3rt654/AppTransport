<?php


class datosSolicitud
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }


  function consultarSolicitudesVendedor()
  {
    $id_usuario = $_SESSION['id_usuario'];
    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT solicitudes.*, servicios.*, personas.* FROM solicitudes INNER JOIN servicios INNER JOIN clientes INNER JOIN personas  ON clientes.id_cliente = solicitudes.id_cliente AND personas.id_persona = clientes.id_persona AND servicios.id_servicio = solicitudes.id_servicio AND servicios.id_vendedor = $id_usuario";
    $resultado = mysqli_query($crearConexion,$consulta);
    $servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($servicios, $result);
    }

    return json_encode($servicios);
    $crearConexion->close();
  }

  function insertar($fecha_inicio, $fecha_final, $punto_inicio_lat, $punto_inicio_lon, $punto_final_lat, $punto_final_lon, $id_servicio, $place_id_inicio, $place_id_final)
  {

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO solicitudes (id_cliente,id_servicio,fecha_inicio,fecha_final,punto_inicio_lat, punto_final_lat, punto_inicio_lon, punto_final_lon, place_id_inicio, place_id_final) VALUES ('{$_SESSION['id_usuario']}','{$id_servicio}','{$fecha_inicio}','{$fecha_final}','{$punto_inicio_lat}','{$punto_final_lat}','{$punto_inicio_lon}','{$punto_final_lon}','{$place_id_inicio}','{$place_id_final}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }

}
