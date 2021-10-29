<?php

include './LogicaServicio.php';
include '../dominio/Servicio.php';
$logicaServicio = new LogicaServicio();

    $accion = $_POST['accion'];
    session_start();
    if ($accion == "insertar") {
    
      $terminos_condiciones = $_POST['terminos_condiciones'];
      $nombre_servicio = $_POST['nombre_servicio'];
      $id_tipo_servicio = $_POST['id_tipo_servicio'];
      $id_vehiculo = $_POST['id_vehiculo'];
       
      echo $logicaServicio->insertar($terminos_condiciones, $nombre_servicio, $id_tipo_servicio, $id_vehiculo);
    } else if ($accion == "consultar") {
    
        echo $logicaServicio->consultar();
    } else if ($accion == "actualizar") {
    
    
      $terminos_condiciones = $_POST['terminos_condiciones'];
      $estimacion_costo = $_POST['estimacion_costo'];
      $nombre_servicio = $_POST['nombre_servicio'];
      $id_cliente = $_POST['id_cliente'];
      $id_vendedor = $_POST['id_vendedor'];
      $id_tipo_servicio = $_POST['id_tipo_servicio'];
      $id_vehiculo = $_POST['id_vehiculo'];
      $id_factura = $_POST['id_factura'];
      $id_servicio = $_POST['id_servicio'];
    
        $servicio = new Servicio($id_servicio, $terminos_condiciones, $estimacion_costo, $nombre_servicio, $id_cliente, $id_vendedor, $id_tipo_servicio, $id_vehiculo, $id_factura);
    
    
        echo $logicaServicio->actualizar($servicio);
    } else if ($accion == "eliminar") {
    
        $id = $_POST['id'];
    
        echo $logicaServicio->eliminar($id);
    } 
