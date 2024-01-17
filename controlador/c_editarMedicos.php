<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_medicos.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idMedico = $_POST["codigo"];
    $identificacion = $_POST["identificacion"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $especialidad = $_POST["especialidad"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];


    $stmt = $bd -> prepare("update medicos set medIdentificacion = ?,medNombres = ?,medApellidos = ?,medEspecialidad = ?,medTelefono = ?,medCorreo = ? where idMedico = ?;");
    $result = $stmt ->execute([$identificacion, $nombre, $apellidos,$especialidad,$telefono,$correo,$idMedico]);

    if($result === true){
        header('location: ../vista/v_medicos.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_medicos.php?mensaje=error');
        exit();
    }
?>