<?php

include '../datos/datosPago.php';
$datosPago = new datosPago();

    $accion = $_POST['accion'];
    session_start();
    if ($accion == "consultarPagos") {       
      echo $datosPago->consultarPagosCliente();
    }