<?php
    /* Validacion */
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["identificacion"]) || empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["fecNacimiento"]) || empty($_POST["genero"])){
        header('location: ../vista/v_pacientes.php?mensaje=falta');
        exit();
    }


    /* Conexion */
    include_once '../modelo/conexion.php';

    /* Toma de datos post */
    $identificacion = $_POST["identificacion"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecNacimiento = $_POST["fecNacimiento"];
    $genero = $_POST["genero"];

    /* Consulta */
    $sentencia = $bd -> prepare("insert into pacientes(paciIdentificacion,pacNombres,pacApellidos,pacFechaNacimiento,pacSexo) values (?,?,?,?,?);");
    $resultado = $sentencia -> execute([$identificacion,$nombres,$apellidos,$fecNacimiento,$genero]);

    /* Validacion consulta */
    if($resultado === true){
        header('location: ../vista/v_pacientes.php?mensaje=registrado');
    } else {
        header('location: ../vista/v_pacientes.php?mensaje=error');
        exit();
    }
?>