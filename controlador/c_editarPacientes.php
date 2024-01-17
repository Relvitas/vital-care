<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_pacientes.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idPaciente = $_POST["codigo"];
    $identificacion = $_POST["identificacion"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];


    $stmt = $bd -> prepare("update pacientes set paciIdentificacion = ?,pacNombres = ?,pacApellidos = ?,pacFechaNacimiento = ?,pacSexo = ? where idPaciente = ?;");
    $result = $stmt ->execute([$identificacion, $nombre, $apellidos,$fecha_nacimiento,$genero,$idPaciente]);

    if($result === true){
        header('location: ../vista/v_pacientes.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_pacientes.php?mensaje=error');
        exit();
    }
?>