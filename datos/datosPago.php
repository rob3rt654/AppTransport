<?php


class datosPago
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }


  function consultarPagosCliente()
  {
    $id_usuario = $_SESSION['id_usuario'];
    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT solicitudes.*, servicios.*, metodo_pagos.* FROM solicitudes INNER JOIN solicitudes_pagos INNER JOIN pagos INNER JOIN metodo_pagos INNER JOIN servicios ON solicitudes_pagos.id_solicitud = solicitudes.id_solicitud AND pagos.id_pago = solicitudes_pagos.id_pago AND metodo_pagos.id_metodo_pago = pagos.id_metodo AND solicitudes.id_servicio = servicios.id_servicio WHERE solicitudes.estado = 'confirmado' AND solicitudes.id_cliente = $id_usuario";
    $resultado = mysqli_query($crearConexion,$consulta);
    $servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($servicios, $result);
    }

    return json_encode($servicios);
    $crearConexion->close();
  }

}
