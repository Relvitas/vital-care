<?php
    /* Validacion de datos Post*/

use LDAP\Result;

    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["fecha"]) || empty($_POST["hora"]) || empty($_POST["identificacion"]) || empty($_POST["medico"]) || empty($_POST["consultorio"]) || empty($_POST["estado"]) || empty($_POST["observaciones"])){
        /* header('location: ../vista/v_citas.php?mensaje=falta');
        exit(); */
    }

    /* Conexion */
    include_once '../modelo/conexion.php';

    /* Toma de datos post */
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $identificacion = $_POST["identificacion"];
    $medico = $_POST["medico"];
    $consultorio = $_POST["consultorio"];
    $estado = $_POST["estado"];
    $observacion = $_POST["observaciones"];
    
    

    

    /* Validar Existencia de Paciente*/
    $sentencia = $bd->prepare("select idPaciente from pacientes where paciIdentificacion = :identificacion;");
    $sentencia->bindParam(':identificacion', $_POST['identificacion']);
    $sentencia->execute();
    $resultado=$sentencia->fetch(PDO::FETCH_ASSOC);

    if(!empty($resultado) && count($resultado)>0){

        /* Extraccion de id Paciente */
        $stmt = $bd->prepare("select idPaciente as id from pacientes where paciIdentificacion=:identificacion;");
        $stmt-> bindParam(':identificacion',$_POST['identificacion']);
        $stmt->execute();
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($paciente, EXTR_PREFIX_SAME,"wddx" );

        /* Insercion de datos */
        $stmt1 = $bd -> prepare("insert into citas(citFecha,citHora,citPaciente,citMedico,citConsultorio,citEstado,citObservaciones) values (?,?,?,?,?,?,?);");
        $result = $stmt1 -> execute([$fecha,$hora,$id,$medico,$consultorio,$estado,$observacion]);

        /* Validacion consulta */
        if($result === true){
            header('location: ../vista/v_citas.php?mensaje=registrado');
        }
    } else{
        header('location: ../vista/v_citas.php?mensaje=inexistente');
    }
    /* Consulta */

    

    
?>