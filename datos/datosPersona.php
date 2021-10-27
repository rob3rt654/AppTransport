<?php


class datosPersona
{

  private $conexion;

  function __construct()
  {
    require_once 'datos.php';
    $this->conexion =  new Conexion();
  }

  function insertar($persona)
  {

    $nombre = $persona->getNombre();
    $apellido = $persona->getApellido();
    $phone = $persona->getPhone();
    $date = $persona->getDate();
    $email = $persona->getEmail();
    $password = $persona->getPassword();
    $tipo = $persona->getTipo();

    $crearConexion = $this->conexion->crearConexion();

    $insert = "INSERT INTO appTransport.personas (nombre,apellidos,fecha_nacimiento,telefono,email,contrasena,tipo_usuario) VALUES ('{$nombre}','{$apellido}','{$date}','{$phone}','{$email}','{$password}','{$tipo}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  
}
