<?php
include './LogicaRegistroUsuario.php';
include '../dominio/Persona.php';
//print_r($_POST);
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : 'null' ;

$logicaPersona = new LogicaRegistroUsuario();
if($accion=="registrar"){
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipoUsuario'];

    $persona = new Persona($name,$apellido, $phone,$date, $email, $password, $tipo);

    //echo $name.$password." ".$tipo;
    $result=$logicaPersona->insertar($persona);

    echo json_encode($result);
    
    //include_once "../vista/vistaVehiculos.php";
}

if($accion=="null"){
    

    //$logicaVehiculo->consultar();
    //include_once "../vista/vistaVehiculos.php";
}



?>