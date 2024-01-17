<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_pacientes.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idPaciente =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from pacientes where idPaciente = ?;");
    $result = $stmt ->execute([$idPaciente]);

    if($result === true){
        header('location: ../vista/v_pacientes.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_pacientes.php?mensaje=error');
        exit();
    }
?>