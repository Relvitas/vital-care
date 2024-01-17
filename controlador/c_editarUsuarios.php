<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_usuarios.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idUsuario = $_POST["codigo"];
    $usuLogin = $_POST["apelativo"];
    $usuPassword = $_POST["contraseña"];
    $usuEstado = $_POST["estado"];
    $usuRol = $_POST["rol"];

    $stmt = $bd -> prepare("update usuarios set usuLogin = ?, usuPassword = ?, usuEstado = ?, usuRol = ? where idUsuario = ?;");
    $result = $stmt ->execute([$usuLogin, $usuPassword, $usuEstado, $usuRol, $idUsuario]);

    if($result === true){
        header('location: ../vista/v_usuarios.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_usuarios.php?mensaje=error');
        exit();
    }
?>