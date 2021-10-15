<?php


class datosVendedor
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
    $consulta = "SELECT * FROM tbadministrador";
    $resultado = mysqli_query($crearConexion,$consulta);
    $administradores = array();
    while ($result = $resultado->fetch_assoc()) {
      array_push($administradores, $result);
    }

    return json_encode($administradores);
    $crearConexion->close();
  }


  function insertar($administrador)
  {

    $nombre = $administrador->getNombre();
    $apellidos = $administrador->getApellidos();
    $correo = $administrador->getCorreo();
    $contrasena = $administrador->getContrasena();

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO tbadministrador (nombre,apellidos,correo,contrasena) VALUES ('{$nombre}','{$apellidos}','{$correo}','{$contrasena}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  function actualizar($administrador)
  {

    $nombre = $administrador->getNombre();
    $apellidos = $administrador->getApellidos();
    $correo = $administrador->getCorreo();
    $contrasena = $administrador->getContrasena();
    $id = $administrador->getId();
    $crearConexion = $this->conexion->crearConexion();

    $actualizar = "UPDATE tbadministrador SET nombre ='".$nombre."',apellidos ='".$apellidos."',
    correo ='".$correo."', contrasena ='".$contrasena."' WHERE id =".$id;

  
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
