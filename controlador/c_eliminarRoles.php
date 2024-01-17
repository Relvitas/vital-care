<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_roles.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idRol =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from roles where id_rol = ?;");
    $result = $stmt ->execute([$idRol]);

    if($result === true){
        header('location: ../vista/v_roles.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_roles.php?mensaje=error');
        exit();
    }
?>