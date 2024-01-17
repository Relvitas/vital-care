<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_medicos.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idMedico =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from medicos where idMedico = ?;");
    $result = $stmt ->execute([$idMedico]);

    if($result === true){
        header('location: ../vista/v_medicos.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_medicos.php?mensaje=error');
        exit();
    }
?>