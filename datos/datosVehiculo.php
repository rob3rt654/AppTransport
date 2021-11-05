<?php


class datosVehiculo
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }


  function consultar($id_vendedor)
  {

    $crearConexion = $this->conexion->crearConexion($id_vendedor);
    $consulta = "SELECT * FROM vehiculos where id_vendedor=".$id_vendedor;
    $resultado = mysqli_query($crearConexion,$consulta);
    $vehiculos = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($vehiculos, $result);
    }

    return $vehiculos;
    $crearConexion->close();
  }


  function insertar($Vehiculo,$vendedor)
  {

    $id_vendedor = $vendedor;
    $color = $Vehiculo->getColor();
    $placa = $Vehiculo->getPlaca();
    $imagenes = $Vehiculo->getImagenes();
    $cantidad_peso = $Vehiculo->getCantidad_peso();
    $cantidad_personas = $Vehiculo->getCantidad_personas();
    $id_tipo_vehiculo = '1';

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO vehiculos (id_vendedor,color,placa,imagenes,capacidad_peso,capacidad_personas,id_tipo_vehiculo) VALUES ('{$id_vendedor}','{$color}','{$placa}','{$imagenes}','{$cantidad_peso}','{$cantidad_personas}',1)";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  function actualizar($Vehiculo,$id)
  {

    $color = $Vehiculo->getColor();
    $cantidad_peso = $Vehiculo->getCantidad_peso();
    $cantidad_personas = $Vehiculo->getCantidad_personas();

    $crearConexion = $this->conexion->crearConexion();
    $actualizar = "UPDATE vehiculos SET color ='".$color."',capacidad_peso ='".$cantidad_peso."',
    capacidad_personas ='".$cantidad_personas."' WHERE id_vehiculo =".$id;

  
    $result = mysqli_query($crearConexion,$actualizar);

    $crearConexion->close();

    return $result;
  }
  function eliminar($id)
  {
    $crearConexion = $this->conexion->crearConexion();

    $eliminar = "DELETE FROM tbadministrador WHERE id =".$id;

    $result = mysqli_query($crearConexion,$eliminar);
    $crearConexion->close();

    return $result;
  }

function verificarVendedor($correo, $contrasena)
  {


    $id = 0;
    $acceso = 0;
    $nombre = "";
    $crearConexion = $this->conexion->crearConexion();
    
    $consulta = mysqli_query ($crearConexion, "SELECT * FROM personas WHERE email = '$correo' AND contrasena = '$contrasena' AND tipo_usuario = 1");  

    while($row = $consulta->fetch_assoc()){

      $id = $row['id_persona'];
      $nombre = $row['nombre'];
    }
    if ($id != 0) {
      $_SESSION['id'] = $id;
      $_SESSION['nombre'] = $nombre;
      $acceso = 1;
    } else {
      $_SESSION['id'] = "";
      $acceso = 0;
    }
    $crearConexion->close();
    return $acceso;
  }

}
