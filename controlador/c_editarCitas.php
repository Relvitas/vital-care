<?php 
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('location: ../vista/v_citas.php?mensaje=error');
    }

    include '../modelo/conexion.php';
    $idCita = $_POST["codigo"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $citPaciente = $_POST["citPaciente"];
    $medico = $_POST["medico"];
    $consultorio = $_POST["consultorio"];
    $estado = $_POST["estado"];
    $observaciones = $_POST["observaciones"];

    $stmt = $bd -> prepare("update citas set citFecha = ?,citHora = ?,citPaciente = ?,citMedico = ?,citConsultorio = ?,citEstado = ?,citObservaciones = ? where idCita = ?;");
    $result = $stmt ->execute([$fecha,$hora,$citPaciente,$medico,$consultorio,$estado,$observaciones,$idCita]);

    if($result === true){
        header('location: ../vista/v_citas.php?mensaje=actualizado');
    } else {
        header('location: ../vista/v_citas.php?mensaje=error');
        exit();
    }
?>