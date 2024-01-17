<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select * from pacientes
    where (idPaciente like '%$buscar%' or 
    pacNombres like '%$buscar%' or 
    paciIdentificacion like '%$buscar%' 
    or pacApellidos like '%$buscar%'
    or pacSexo like '%$buscar%' 
    or pacFechaNacimiento like '%$buscar%');");
    $paciente = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>