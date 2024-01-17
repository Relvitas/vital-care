<?php

    session_start();

    /* Conexion */
    include_once '../modelo/conexion.php';
    
    /* Captura de datos */
    $usuario = $_POST["usuario"];
    $contrasenha = $_POST["contrasenha"];

    /* Consulta */
    $stmt = $bd -> prepare ("select * from usuarios where usuLogin = ? and usuPassword = ?;");
    $stmt -> execute([$usuario, $contrasenha]);
    $datos = $stmt ->fetch(PDO::FETCH_OBJ);
    //print_r($datos);

    /* Validacion */
    if($datos === false){
        header('location: ../vista/login.php?mensaje=incorrecto');
    } else if($stmt -> rowCount() == 1){
        $_SESSION['nombre'] = $datos -> usuLogin;
        header('location: ../vista/index.php');
    }

?>
