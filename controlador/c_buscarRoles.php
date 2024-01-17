<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select * from roles
    where (id_rol like '%$buscar%' or 
    nombre_rol like '%$buscar%');");
    $rol = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>