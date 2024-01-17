<?php
    /* Validacion */
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["rol"])){
        header('location: ../vista/v_roles.php?mensaje=falta');
        exit();
    }

    /* Conexion */
    include_once '../modelo/conexion.php';

    /* Toma de datos post */
    $rol = $_POST["rol"];

    /* Consulta */
    $sentencia = $bd -> prepare("insert into roles(nombre_rol) values (?);");
    $resultado = $sentencia -> execute([$rol]);

    /* Validacion consulta */
    if($resultado === true){
        header('location: ../vista/v_roles.php?mensaje=registrado');
    } else {
        header('location: ../vista/v_roles.php?mensaje=error');
        exit();
    }
?>