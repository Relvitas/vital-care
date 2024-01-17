<?php
    if(isset($_POST['buscar'])){
        $buscar = $_POST['buscar'];

    include '../modelo/conexion.php';

    $sentencia = $bd->query("select * from usuarios
    where (idUsuario like '%$buscar%' or 
    usuLogin like '%$buscar%' or 
    usuPassword like '%$buscar%' 
    or usuEstado like '%$buscar%' 
    or usuRol like '%$buscar%');");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
?>