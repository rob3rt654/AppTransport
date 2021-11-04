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

    $rs = mysqli_query($crearConexion, "SELECT MAX(id_persona) AS id FROM personas");
    while($row = $rs->fetch_assoc()){

      $id = $row['id'];
      if($tipo == 1){
        $this->insertarVendedor($id);
      }else{
        $this->insertarCliente($id);
      }
    }

    $crearConexion->close();
    return $result;
  }

  function insertarCliente($id){
    $crearConexion = $this->conexion->crearConexion();
    
    $insert = "INSERT INTO appTransport.clientes (id_persona) VALUES ('{$id}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();


    return $result;
  }

  function insertarVendedor($id){
    $crearConexion = $this->conexion->crearConexion();
    $insert = "INSERT INTO appTransport.vendedores (id_persona) VALUES ('{$id}')";

    $result = mysqli_query($crearConexion,$insert);

    $crearConexion->close();

    return $result;
  }
  
}
