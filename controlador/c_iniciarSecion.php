<?php
    //print_r($_POST);

    include_once '../modelo/conexion.php';
    session_start();
    $usuario = $_POST["usuario"];
    $contrasenha = $_POST["contrasenha"];
    $stmt = $bd->prepare("select usuRol,id_rol from usuarios inner join roles on usuarios.usuRol = roles.nombre_rol  where usuLogin = ? and usuPassword = ?;");
    $stmt->execute([$usuario, $contrasenha]);
    $datos = $stmt->fetch(PDO::FETCH_OBJ);
    //print_r($datos);

    if ($datos === false) {
        header('location: ../vista/login.php?mensaje=incorrecto');
    } else if ($stmt->rowCount() == 1) {
        $_SESSION['id'] = $datos->id_rol;
        $_SESSION['rol'] = $datos->usuRol;
        header('location: ../vista/index.php');
    }
?>