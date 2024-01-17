<!-- Inclucion de header -->
<?php
$page = 2;
include 'header.php';
?>

<!-- Consulta -->
<?php

    /* Validacion */
    if(!isset($_GET['codigo'])){
        header('location: v_roles.php?mensaje=error');
        exit();
    }

    /* Conexion base de datos */
    include_once '../modelo/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("select * from roles where id_rol = ?;");
    $sentencia -> execute([$codigo]);
    $rol = $sentencia ->fetch(PDO::FETCH_OBJ);
    //print_r($rol);
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    Editar Datos
                </div>
                <form action="../controlador/c_editarRoles.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Nombre Rol:
                        </label>
                        <input type="text" class="form-control" name="rol" autofocus required value="<?php echo $rol->nombre_rol?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $rol -> id_rol;?>">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>