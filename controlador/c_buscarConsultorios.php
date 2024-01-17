<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select * from consultorios
    where (idConsultorio like '%$buscar%' or 
    conNombre like '%$buscar%');");
    $consultorio = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>