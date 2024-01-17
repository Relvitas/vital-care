<!-- Inclucion de header -->
<?php
$page = 4;
include 'header.php';
?>

<!-- Consulta -->
<?php

    /* Validacion */
    if(!isset($_GET['codigo'])){
        header('location: v_medicos.php?mensaje=error');
        exit();
    }

    /* Conexion base de datos */
    include_once '../modelo/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("select * from medicos where idMedico = ?;");
    $sentencia -> execute([$codigo]);
    $medico = $sentencia ->fetch(PDO::FETCH_OBJ);
    //print_r($rol);
    
?>

<!-- Formulario -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    Editar Datos
                </div>
                <form action="../controlador/c_editarMedicos.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            N° Identificacion:
                        </label>
                        <input type="text" class="form-control" name="identificacion" autofocus required value="<?php echo $medico->medIdentificacion?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Nombres:
                        </label>
                        <input type="text" class="form-control" name="nombre" autofocus required value="<?php echo $medico->medNombres?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Aperllidos:
                        </label>
                        <input type="text" class="form-control" name="apellidos" autofocus required value="<?php echo $medico->medApellidos?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Especialidad:
                        </label>
                        <input type="text" class="form-control" name="especialidad" autofocus required value="<?php echo $medico->medEspecialidad?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            N° Identificacion:
                        </label>
                        <input type="tel" class="form-control" name="telefono" autofocus required value="<?php echo $medico->medTelefono?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Correo:
                        </label>
                        <input type="email" class="form-control" name="correo" autofocus required value="<?php echo $medico->medCorreo?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $medico -> idMedico;?>">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>