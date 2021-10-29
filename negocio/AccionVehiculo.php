<?php
include './LogicaVehiculo.php';
include '../dominio/Vehiculo.php';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : 'null' ;

$logicaVehiculo = new logicaVehiculo();
if($accion=="insertar"){
    $color = $_POST['color'];
    $placa = $_POST['placa'];
    $peso = $_POST['peso'];
    $personas = $_POST['personas'];
    $tipo = $_POST['tipo'];
    $vehiculo = new Vehiculo("1",$color, $placa,'imagen.png', $peso, $personas, $tipo);

    
    $logicaVehiculo->insertar($vehiculo);
    
    include_once "../vista/vistaVehiculos.php";
}

if($accion=="null"){

    $logicaVehiculo->consultar();
    include_once "../vista/vistaVehiculos.php";
} else if ($accion == "consultar") {
    $id_vendedor = $_POST['id_vendedor'];
    echo $logicaVehiculo->consultar($id_vendedor);

}

?>