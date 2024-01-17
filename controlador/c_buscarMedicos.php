<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select * from medicos
    where (idMedico like '%$buscar%' or 
    medIdentificacion like '%$buscar%' or 
    medNombres like '%$buscar%' or 
    medApellidos like '%$buscar%' or 
    medEspecialidad like '%$buscar%' or 
    medTelefono like '%$buscar%' or 
    medCorreo like '%$buscar%');");
    $medico = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>