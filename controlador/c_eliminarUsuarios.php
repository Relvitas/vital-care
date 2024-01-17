<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_usuarios.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idUsuario =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from usuarios where idUsuario = ?;");
    $result = $stmt ->execute([$idUsuario]);

    if($result === true){
        header('location: ../vista/v_usuarios.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_usuarios.php?mensaje=error');
        exit();
    }
?>