<?php
    /* Validacion */
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["identificacion"]) || empty($_POST["nombres"]) || empty($_POST["apellidos"]) || empty($_POST["especialidad"]) || empty($_POST["telefono"]) || empty($_POST["correo"])){
        header('location: ../vista/v_medicos.php?mensaje=falta');
        exit();
    }

    /* Conexion */
    include_once '../modelo/conexion.php';

    /* Toma de datos post */
    $identificacion = $_POST["identificacion"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $especialidad = $_POST["especialidad"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    /* Consulta */
    $sentencia = $bd -> prepare("insert into medicos(medIdentificacion,medNombres,medApellidos,medEspecialidad,medTelefono,medCorreo) values (?,?,?,?,?,?);");
    $resultado = $sentencia -> execute([$identificacion,$nombres,$apellidos,$especialidad,$telefono,$correo]);

    /* Validacion consulta */
    if($resultado === true){
        header('location: ../vista/v_medicos.php?mensaje=registrado');
    } else {
        header('location: ../vista/v_medicos.php?mensaje=error');
        exit();
    }
?>