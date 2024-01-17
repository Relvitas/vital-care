<!-- Inclucion de header -->
<?php
$page = 6;
include 'header.php';
?>

<!-- Consulta -->
<?php

    /* Validacion */
    if(!isset($_GET['codigo'])){
        header('location: v_pacientes.php?mensaje=error');
        exit();
    }

    /* Conexion base de datos */
    include_once '../modelo/conexion.php';
    $codigo = $_GET['codigo'];

    /* query */
    $sentencia = $bd -> prepare("select * from pacientes where idPaciente = ?;");
    $sentencia -> execute([$codigo]);
    $paciente = $sentencia ->fetch(PDO::FETCH_OBJ);
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
                <form action="../controlador/c_editarPacientes.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            N° Identificacion:
                        </label>
                        <input type="text" class="form-control" name="identificacion" autofocus required value="<?php echo $paciente->paciIdentificacion?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Nombres:
                        </label>
                        <input type="text" class="form-control" name="nombre" required value="<?php echo $paciente->pacNombres?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Apellidos:
                        </label>
                        <input type="text" class="form-control" name="apellidos" required value="<?php echo $paciente->pacApellidos?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Fecha Nacimiento:
                        </label>
                        <input type="date" class="form-control" name="fecha_nacimiento" required value="<?php echo $paciente->pacFechaNacimiento?>">
                    </div>
                    <div class="input-group">
                        <div class="me-3">Genero:</div>
                        <div class=" mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                            <input class="form-check-input" type="radio" name="genero" value="Masculino" id="inlineRadio1" required <?php if($paciente -> pacSexo =='Masculino'){echo "checked";} ?>>
                        </div>
                        <div class="mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio2">Femenino</label>
                            <input class="form-check-input" type="radio" name="genero" value="Femenino" id="inlineRadio2" <?php if($paciente -> pacSexo =='Femenino'){echo "checked";} ?>>
                        </div>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $paciente -> idPaciente;?>">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>