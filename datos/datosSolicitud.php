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

  function consultarSolicitudesCliente()
  {
    $id_usuario = $_SESSION['id_usuario'];
    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT solicitudes.*, servicios.*, personas.* FROM solicitudes INNER JOIN servicios INNER JOIN vendedores INNER JOIN personas INNER JOIN clientes  ON vendedores.id_vendedor = servicios.id_vendedor AND personas.id_persona = vendedores.id_persona AND servicios.id_servicio = solicitudes.id_servicio AND solicitudes.id_cliente = $id_usuario";
    $resultado = mysqli_query($crearConexion,$consulta);
    $servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($servicios, $result);
    }

    return json_encode($servicios);
    $crearConexion->close();
  }

  function insertar($fecha_inicio, $fecha_final, $punto_inicio_lat, $punto_inicio_lon, $punto_final_lat, $punto_final_lon, $id_servicio, $place_id_inicio, $place_id_final, $cantidad_personas)
  {

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO solicitudes (id_cliente,id_servicio,fecha_inicio,fecha_final,punto_inicio_lat, punto_final_lat, punto_inicio_lon, punto_final_lon, place_id_inicio, place_id_final, cantidad_personas) VALUES ('{$_SESSION['id_usuario']}','{$id_servicio}','{$fecha_inicio}','{$fecha_final}','{$punto_inicio_lat}','{$punto_final_lat}','{$punto_inicio_lon}','{$punto_final_lon}','{$place_id_inicio}','{$place_id_final}','{$cantidad_personas}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }

  function rechazarSolicitud($id)
  {

    $crearConexion = $this->conexion->crearConexion();

    $delete = "DELETE FROM solicitudes WHERE id_solicitud = $id";

    $result = mysqli_query($crearConexion,$delete);

    $crearConexion->close();

    return $result;
  }

  function estimarServicio($id, $estimacion)
  {

    $crearConexion = $this->conexion->crearConexion();

    $update = "UPDATE solicitudes SET estimacion ='".$estimacion."' WHERE id_solicitud =".$id;

    $result = mysqli_query($crearConexion,$update);

    $crearConexion->close();

    return $result;
  }
  function solicitudReestimacion($id, $estimacion, $motivo){
    $crearConexion = $this->conexion->crearConexion();

    $update = "UPDATE solicitudes SET reestimacion ='".$estimacion."', motivo_reestimacion ='".$motivo."'  WHERE id_solicitud =".$id;

    $result = mysqli_query($crearConexion,$update);

    $crearConexion->close();

    return $result;
  }
  function actualizarEstadoReestimacion($id, $estado){
    $crearConexion = $this->conexion->crearConexion();

    $update = "UPDATE solicitudes SET estado_reestimacion='".$estado."' WHERE id_solicitud =".$id;

    $result = mysqli_query($crearConexion,$update);

    $crearConexion->close();

    return $result;
  }
  function realizarPago($id){
    $crearConexion = $this->conexion->crearConexion();

    $update = "UPDATE solicitudes SET estado='confirmado' WHERE id_solicitud =".$id;

    $result = mysqli_query($crearConexion,$update);

    $crearConexion->close();

    return $result;
  }
  function insertarMetodoPago($nombre, $numero, $vencimiento, $cvc)
  {

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO metodo_pagos (numero_tarjeta,fecha_vencimiento,cvc,nombre_propietario,id_cliente) VALUES ('{$numero}','{$vencimiento}','{$cvc}','{$nombre}','{$_SESSION['id_usuario']}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  function insertarPago(){
    $crearConexion = $this->conexion->crearConexion();
    $rs = mysqli_query($crearConexion, "SELECT MAX(id_metodo_pago) AS id FROM metodo_pagos");
    while($row = $rs->fetch_assoc()){
      $id = $row['id'];
    }
    $insert = "INSERT INTO pagos (tipo_pago,id_metodo) VALUES ('total','{$id}')";
    $result = mysqli_query($crearConexion,$insert);
    $crearConexion->close();

    return $result;
  }
  function insertarSolicitudPago($id_solicitud){
    $crearConexion = $this->conexion->crearConexion();
    $rs = mysqli_query($crearConexion, "SELECT MAX(id_pago) AS id FROM pagos");
    while($row = $rs->fetch_assoc()){
      $id = $row['id'];
    }
    $insert = "INSERT INTO solicitudes_pagos (id_solicitud,id_pago) VALUES ('{$id_solicitud}','{$id}')";
    $result = mysqli_query($crearConexion,$insert);
    $crearConexion->close();

    return $result;
  }
}
