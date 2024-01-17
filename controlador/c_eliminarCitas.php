<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_citas.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idCitas =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from citas where idCita = ?;");
    $result = $stmt ->execute([$idCitas]);

    if($result === true){
        header('location: ../vista/v_citas.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_citas.php?mensaje=error');
        exit();
    }
?>