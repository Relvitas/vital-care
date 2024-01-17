<!-- Inculucion de header -->
<?php
$page = 5;
include 'header.php';
?>

<!-- Consulta -->
<?php
    /* Validacion */
    if(!isset($_GET['codigo'])){
        header('location: v_citas.php?mensaje=error');
        exit();
    }

    include_once '../modelo/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("
    SELECT 
        citas.idCita,
        citas.citFecha,
        citas.citHora,
        citas.citPaciente,
        pacientes.paciIdentificacion,
        pacientes.pacNombres,
        citas.citEstado,
        citas.citObservaciones,
        medicos.medNombres,
        consultorios.conNombre
    FROM
        citas
            right JOIN
        pacientes ON citas.citPaciente = pacientes.idPaciente
        right join
      medicos on citas.citMedico=medicos.idMedico
        inner join
      consultorios on citas.citConsultorio=consultorios.idConsultorio where idCita=?;");
    $sentencia -> execute([$codigo]);
    $cita = $sentencia ->fetch(PDO::FETCH_OBJ);
    
    /* Consulta #2 */
  $sql = "select idMedico, medNombres from medicos;";
  $sentencia2 = $bd -> prepare($sql);
  $sentencia2 -> execute();
  $medico = $sentencia2 -> fetchAll(PDO::FETCH_ASSOC);

  /* Consulta #3 */
  $sql2 = "select * from consultorios;";
  $sentencia3 = $bd -> prepare($sql2);
  $sentencia3 -> execute();
  $consultorio = $sentencia3 -> fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Formulario -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    Editar Datos
                </div>
                <form action="../controlador/c_editarCitas.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Fecha:
                        </label>
                        <input type="date" class="form-control" name="fecha" autofocus required value="<?php echo $cita->citFecha?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Hora:
                        </label>
                        <input type="time" class="form-control" name="hora" required value="<?php echo $cita->citHora?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            DNI Paciente:
                        </label>
                        <input type="text" class="form-control" name="identificacion" readonly value="<?php echo $cita->paciIdentificacion?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Nombre Paciente:
                        </label>
                        <input type="text" class="form-control" name="nombre" readonly value="<?php echo $cita->pacNombres?>">
                        <input type="hidden" name="citPaciente" value="<?php echo $cita -> citPaciente;?>">
                    </div>
                    <div class="mb-2">Medico:</div>
                        <select class="form-select mb-3" aria-label="Default select" name="medico">
                            <option selected disabled>Selecciona un medico...</option>
                            <!-- Lista Select Medicos -->
                            <?php
                            foreach($medico as $infMedico){
                            ?>

                            <option value="<?php echo $infMedico['idMedico']?>"<?php if($cita->medNombres == $infMedico['medNombres']) echo 'selected';?>><?php echo $infMedico['medNombres']?></option>

                            <?php
                            }
                            ?>
                        </select>
                    <div class="mb-2">Consultorio:</div>
                        <select class="form-select mb-3" aria-label="Default select" name="consultorio">
                            <option selected disabled>Selecciona un consultorio...</option>
                            <!-- Lista Select Consultorios -->
                            <?php
                            foreach($consultorio as $infCons){
                            ?>

                            <option value="<?php echo $infCons['idConsultorio'];?>"<?php if($cita->conNombre == $infCons['conNombre']) echo 'selected';?>><?php echo $infCons['conNombre'];?></option>

                            <?php
                            }
                            ?>
                        </select>
                    <div class="input-group">
                        <div class="me-3">Estado:</div>
                        <div class=" mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Asignado</label>
                            <input class="form-check-input" type="radio" name="estado" value="Asignado" id="inlineRadio1" required <?php if($cita -> citEstado =='Asignado'){echo "checked";} ?>>
                        </div>
                        <div class="mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio2">Atendido</label>
                            <input class="form-check-input" type="radio" name="estado" value="Atendido" id="inlineRadio2" <?php if($cita -> citEstado =='Atendido'){echo "checked";} ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Observaciones:</label>
                        <textarea class="form-control mb-3" id="" rows="3" name="observaciones"><?php echo $cita->citObservaciones?></textarea>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $cita -> idCita;?>">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>