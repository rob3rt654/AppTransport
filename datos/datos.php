<?php

class Conexion
{

  private $server;
  private $user;
  private $password;
  private $dbname;
  private $conexion;


  function __construct()
  {
    $this->server = "mysql-59324-0.cloudclusters.net";
    $this->user = "admin";
    $this->password = "3Lous2IX";
    $this->dbname = "appTransport";
    $this->port = "19497";
  }

  function crearConexion()
  {
    $host = gethostname();
    $this->conexion  = new mysqli($this->server, $this->user, $this->password, $this->dbname, $this->port);
    return $this->conexion;
  }

  function cerrarConexion()
  {
    mysqli_close($this->conexion);
  }

 
}
