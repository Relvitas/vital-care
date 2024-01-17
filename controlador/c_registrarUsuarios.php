<?php
    /* solicitud de datos */
    //print_r($_POST);
    if (empty($_POST["oculto"]) || empty($_POST["apelativo"]) ||empty($_POST["contraseña"]) || empty($_POST["estado"]) ||empty($_POST["rol"])){
        header('location: ../vista/v_usuarios.php?mensaje=falta');
        exit();
    }

    /* inclusión de conexión */
    include_once '../modelo/conexion.php';

    /* Trasnporte de datos a variables */
    $usuLogin = $_POST["apelativo"];
    $usuPassword = $_POST["contraseña"];
    $usuEstado = $_POST["estado"];
    $usuRol = $_POST["rol"];
    
    /* insercion de datos en a la bd */
    $sentencia = $bd -> prepare("insert into usuarios(usuLogin, usuPassword, usuEstado, usuRol) values (?, ?, ?, ?);");

    $resultado = $sentencia -> execute ([$usuLogin, $usuPassword, $usuEstado, $usuRol]);

    /* Comprobación */
    if ($resultado === true){
        header('location: ../vista/v_usuarios.php?mensaje=registrado');
    } else {
        header('location: ../vista/v_usuarios.php?mensaje=error');
        exit();
    }
?>