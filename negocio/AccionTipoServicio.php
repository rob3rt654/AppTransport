<?php

include './LogicaTipoServicio.php';
$logicaTipoServicio = new LogicaTipoServicio();

    $accion = $_POST['accion'];
    session_start();
   if ($accion == "consultar") {
    
        echo $logicaTipoServicio->consultar();
    } 
    
      
