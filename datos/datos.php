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
    $this->server = "mysql-54437-0.cloudclusters.net";
    $this->user = "admin";
    $this->password = "P69grh4f";
    $this->dbname = "appTransport";
    $this->port = "12154";
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
