<?php


class datosServicio
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }


  function consultar()
  {
    $id_usuario = $_SESSION['id_usuario'];
    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT servicios.* , tipo_servicios.nombre_tipo_servicio AS tipo_servicio , vehiculos.* FROM servicios INNER JOIN tipo_servicios INNER JOIN vehiculos ON servicios.id_tipo_servicio = tipo_servicios.id_tipo_servicio AND vehiculos.id_vehiculo = servicios.id_vehiculo AND servicios.id_vendedor = $id_usuario";
    $resultado = mysqli_query($crearConexion,$consulta);
    $servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($servicios, $result);
    }

    return json_encode($servicios);
    $crearConexion->close();
  }

  function consultarTodos()
  {
    $crearConexion = $this->conexion->crearConexion();
    $consulta = "SELECT servicios.* , tipo_servicios.nombre_tipo_servicio AS tipo_servicio , vehiculos.* FROM servicios INNER JOIN tipo_servicios INNER JOIN vehiculos ON servicios.id_tipo_servicio = tipo_servicios.id_tipo_servicio AND vehiculos.id_vehiculo = servicios.id_vehiculo";
    $resultado = mysqli_query($crearConexion,$consulta);
    $servicios = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($servicios, $result);
    }

    return json_encode($servicios);
    $crearConexion->close();
  }

  function insertar($terminos_condiciones, $nombre_servicio, $id_tipo_servicio, $id_vehiculo)
  {

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO servicios (nombre_servicio,terminos_condiciones,id_vendedor,id_tipo_servicio,id_vehiculo) VALUES ('{$nombre_servicio}','{$terminos_condiciones}','{$_SESSION['id']}','{$id_tipo_servicio}','{$id_vehiculo}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  function actualizar($servicio)
  {
    $id_servicio = $servicio->getId_servicio();
    $terminos_condiciones = $servicio->getTerminos_condiciones();
    $estimacion_costo = $servicio->getEstimacion_costo();
    $nombre_servicio = $servicio->getNombre_servicio();
    $id_cliente = $servicio->getId_cliente();
    $id_vendedor = $servicio->getId_vendedor();
    $id_tipo_servicio = $servicio->getId_tipo_servicio();
    $id_vehiculo = $servicio->getId_vehiculo();
    $id_factura = $servicio->getId_factura();

    $crearConexion = $this->conexion->crearConexion();

    $actualizar = "UPDATE servicios SET nombre_servicio ='".$nombre_servicio."',terminos_condiciones ='".$terminos_condiciones."',
    estimacion_costo ='".$estimacion_costo."', id_cliente ='".$id_cliente."', id_vendedor='".$id_vendedor."', id_tipo_servicio='".$id_tipo_servicio."',
    id_vehiculo='".$id_vehiculo."', id_factura='".$id_factura."' WHERE id_servicio =".$id_servicio;

  
    $result = mysqli_query($crearConexion,$actualizar);

    $crearConexion->close();

    return $result;
  }
  function eliminar($id)
  {
    $crearConexion = $this->conexion->crearConexion();

    $eliminar = "DELETE FROM servicios WHERE id_servicio =".$id;

    $result = mysqli_query($crearConexion,$eliminar);
    $crearConexion->close();

    return $result;
  }



}
