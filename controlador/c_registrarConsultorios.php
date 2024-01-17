<?php
    /* Validacion */
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["nombre"])){
        header('location: ../vista/v_consultorios.php?mensaje=falta');
        exit();
    }

    /* Conexion */
    include_once '../modelo/conexion.php';

    /* Toma de datos post */
    $nombreConsultorio = $_POST["nombre"];

    /* Consulta */
    $sentencia = $bd -> prepare("insert into consultorios(conNombre) values (?);");
    $resultado = $sentencia -> execute([$nombreConsultorio]);

    /* Validacion consulta */
    if($resultado === true){
        header('location: ../vista/v_consultorios.php?mensaje=registrado');
    } else {
        header('location: ../vista/v_consultorios.php?mensaje=error');
        exit();
    }
?>