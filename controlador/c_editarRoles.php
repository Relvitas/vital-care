<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_roles.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idRol = $_POST["codigo"];
    $rol = $_POST["rol"];

    $stmt = $bd -> prepare("update roles set nombre_rol = ?where id_rol = ?;");
    $result = $stmt ->execute([$rol, $idRol]);

    if($result === true){
        header('location: ../vista/v_roles.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_roles.php?mensaje=error');
        exit();
    }
?>