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
       
      echo $datosSolicitud->insertar($fecha_inicio, $fecha_final, $punto_inicio_lat, $punto_inicio_lon, $punto_final_lat, $punto_final_lon, $id_servicio, $place_id_inicio, $place_id_final);
    }else if ($accion == "consultarSolicitudesVendedor") {       
      echo $datosSolicitud->consultarSolicitudesVendedor();
    }