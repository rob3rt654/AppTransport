<?php
include './LogicaVehiculo.php';
include '../dominio/Vehiculo.php';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : 'null' ;

$logicaVehiculo = new logicaVehiculo();

if($accion=="null" || !isset($_POST['accion'])){
    
    session_start();
    $vehiculos=$logicaVehiculo->consultar($_SESSION['id']);
    //print_r($vehiculos);

    
   
    include_once "../vista/vistaVehiculos.php";
} 

if($accion=="cuenta"){
    session_start();
    //echo $_SESSION['id'];
    $cuenta = $_POST['cuentaiban'];
    
    //print_r($vendedor['0']);
    //$vendedor['0']['cuenta_iban']='000';
    $contador=$logicaVehiculo->actualizarcuenta($cuenta,$_SESSION['id']);
    $vendedor=$logicaVehiculo->consultariban($_SESSION['id']);
    include_once "../vista/vistaCuentaIban.php";
}

if($accion=="cargarcuenta"){
    session_start();
    $vendedor=$logicaVehiculo->consultariban($_SESSION['id']);
    //print_r($vendedor['0']);
    //$vendedor['0']['cuenta_iban']='000';
    include_once "../vista/vistaCuentaIban.php";
    
    
}

if($accion=="insertar"){
    
    $color = $_POST['color'];
    $placa = $_POST['placa'];
    $peso = $_POST['peso'];
    $personas = $_POST['personas'];
    $tipo = $_POST['tipo'];
   
    $contador=$logicaVehiculo->consultarUltimo();
   
    
    $imagen = $contador['0']['contador'].'-img.jpg' ;
    
    
    $ruta='../imagenes/'.$imagen;
    session_start();
    $vehiculo = new Vehiculo($_SESSION['id'],$color, $placa,$imagen, $peso, $personas, $tipo);
    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
  

    $logicaVehiculo->insertar($vehiculo,$_SESSION['id']);
    
    $vehiculos=$logicaVehiculo->consultar($_SESSION['id']);
    include_once "../vista/vistaVehiculos.php";
}

if($accion=="editar"){

    $color = $_POST['color'];
    $id = $_POST['id'];
    $peso = $_POST['peso'];
    $personas = $_POST['personas'];
    $vehiculo = new Vehiculo('1',$color, '1','1', $peso, $personas, '1');
    //$logicaVehiculo->editar($vehiculo,$_SESSION['id']);
    session_start();
    $vehiculos=$logicaVehiculo->actualizar($vehiculo,$id);
    $vehiculos=$logicaVehiculo->consultar($_SESSION['id']);
    include_once "../vista/vistaVehiculos.php";
    
}



?>