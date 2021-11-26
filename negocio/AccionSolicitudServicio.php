<?php

include '../datos/datosSolicitud.php';
$datosSolicitud = new datosSolicitud();

    $accion = $_POST['accion'];
    session_start();
    if ($accion == "insertar") {
    
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_final = $_POST['fecha_final'];
      $punto_inicio_lat = $_POST['punto_inicio_lat'];
      $punto_inicio_lon = $_POST['punto_inicio_lon'];
      $punto_final_lat = $_POST['punto_final_lat'];
      $punto_final_lon = $_POST['punto_final_lon'];
      $id_servicio = $_POST['id_servicio'];
      $place_id_inicio = $_POST['place_id_inicio'];
      $place_id_final = $_POST['place_id_final'];
      $cantidad_personas = $_POST['cantidad_personas'];
       
      echo $datosSolicitud->insertar($fecha_inicio, $fecha_final, $punto_inicio_lat, $punto_inicio_lon, $punto_final_lat, $punto_final_lon, $id_servicio, $place_id_inicio, $place_id_final, $cantidad_personas);
    }else if ($accion == "consultarSolicitudesVendedor") {       
      echo $datosSolicitud->consultarSolicitudesVendedor();
    }else if ($accion == "rechazarSolicitud") {     
      $id = $_POST['id'];  
      echo $datosSolicitud->rechazarSolicitud($id);
    }else if ($accion == "estimarServicio") {     
      $id = $_POST['id'];
      $estimacion = $_POST['estimacion'];
      echo $datosSolicitud->estimarServicio($id, $estimacion);
    }else if ($accion == "consultarSolicitudesCliente") { 
      echo $datosSolicitud->consultarSolicitudesCliente();
    }else if($accion == "solicitudReestimacion"){
      $id = $_POST['id'];
      $estimacion = $_POST['estimacion'];
      $motivo = $_POST['motivo'];
      echo $datosSolicitud->solicitudReestimacion($id, $estimacion, $motivo);
    }else if($accion == "aceptarReestimacion"){
      $id = $_POST['id'];
      $estado = "aceptada";
      echo $datosSolicitud->actualizarEstadoReestimacion($id, $estado);
    }else if($accion == "rechazarReestimacion"){
      $id = $_POST['id'];
      $estado = "rechazada";
      echo $datosSolicitud->actualizarEstadoReestimacion($id, $estado);
    }else if($accion == "realizarPago"){
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $num_tarjeta = $_POST['num_tarjeta'];
      $vencimiento = $_POST['vencimiento'];
      $cvc = $_POST['cvc'];
      if($datosSolicitud->insertarMetodoPago($nombre, $num_tarjeta, $vencimiento, $cvc) == 1){
        if($datosSolicitud->insertarPago() == 1){
          if($datosSolicitud->insertarSolicitudPago($id) == 1){
            echo $datosSolicitud->realizarPago($id);
          }
        }
      }
      
    }