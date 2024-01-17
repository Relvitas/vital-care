<?php 
    if(!isset($_GET['codigo'])){
        header('location: ../vista/v_consultorios.php?mensaje=error');
        exit();
    }

    include '../modelo/conexion.php';
    $idConsultorio =  $_GET['codigo'];

    $stmt = $bd -> prepare("delete from consultorios where idConsultorio = ?;");
    $result = $stmt ->execute([$idConsultorio]);

    if($result === true){
        header('location: ../vista/v_consultorios.php?mensaje=eliminado');
    } else {
        header('location: ../vista/v_consultorios.php?mensaje=error');
        exit();
    }
?>