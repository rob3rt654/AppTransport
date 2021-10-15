<?php

include './LogicaVendedor.php';
include '../dominio/Vendedor.php';
$logicaVendedor = new LogicaVendedor();

    $accion = $_POST['accion'];
    session_start();
    if ($accion == "insertar") {
    
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
    
        $administrador = new Administrador(0, $nombre, $apellidos, $correo, $contrasena);
    
        echo $logicaAdministrador->insertar($administrador);
    } else if ($accion == "consultar") {
    
        echo $logicaAdministrador->consultar();
    } else if ($accion == "actualizar") {
    
    
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $id = $_POST['id'];
    
        $administrador = new Administrador($id, $nombre, $apellidos, $correo, $contrasena);
    
    
        echo $logicaAdministrador->actualizar($administrador);
    } else if ($accion == "eliminar") {
    
        $id = $_POST['id'];
    
        echo $logicaAdministrador->eliminar($id);
    } else  if ($accion == 'verificarVendedor') {
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        echo $logicaVendedor->verificarVendedor($correo, $contra);
    } else  if ($accion == 'cerrarsesion') {
        session_destroy();
    }
