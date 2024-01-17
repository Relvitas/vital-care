<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select citas.idCita,
    citas.citFecha,
    citas.citHora,
    pacientes.paciIdentificacion,
    pacientes.pacNombres,
    citas.citEstado,
    citas.citObservaciones,
    medicos.medNombres,
    consultorios.conNombre from citas right JOIN
    pacientes ON citas.citPaciente = pacientes.idPaciente
    right join
  medicos on citas.citMedico=medicos.idMedico
    inner join
  consultorios on citas.citConsultorio=consultorios.idConsultorio
    where (idCita like '%$buscar%' or
    citFecha like '%$buscar%' or
    citHora like '%$buscar%' or
    paciIdentificacion like '%$buscar%' or
    pacNombres like '%$buscar%' or
    citEstado like '%$buscar%' or
    citObservaciones like '%$buscar%' or
    medNombres like '%$buscar%');");
    $cita = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>