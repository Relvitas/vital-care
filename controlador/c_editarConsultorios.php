<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_consultorios.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idConsultorio = $_POST["codigo"];
    $consultorio = $_POST["consultorio"];

    $stmt = $bd -> prepare("update consultorios set conNombre = ? where idConsultorio = ?;");
    $result = $stmt ->execute([$consultorio,$idConsultorio]);

    if($result === true){
        header('location: ../vista/v_consultorios.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_consultorios.php?mensaje=error');
        exit();
    }
?>