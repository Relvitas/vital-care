<!-- Inclusion del header -->
<?php
  $page = 5;
  include 'header.php';
?>

<!-- Consulta -->
<?php
include_once "../modelo/conexion.php";
$sentencia = $bd->query("select * from citas");
$cita = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($cita);
?>

<!-- Consulta #1 -->
<?php
include_once "../modelo/conexion.php";
$sentencia = $bd->query("
                          SELECT 
                              citas.idCita,
                              citas.citFecha,
                              citas.citHora,
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
                            consultorios on citas.citConsultorio=consultorios.idConsultorio order by idCita asc;");
$cita = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($cita);

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


<!-- Vista Citas -->
<div class="container-fluid mt-5">
  <div class="row row-cols-lg-2 justify-content-center">
    <div class="col-md-fluid">

      <!-- Inicio Alertas -->

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellena todos los campos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Cita registrada correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentar.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'existente') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> El paciente ya presenta cita asignada.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'inexistente') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Por favor registrar paciente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>OK!</strong> Los datos fueron actualizados
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ok!</strong> Datos eliminados
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <!-- Fin Alertas -->

      <div class="card">
        <div class="card-header">
          Lista de Citas
          <div class="col-1 float-end">
            <a href="v_buscarCitas.php" class="text-success"><i class="fa-solid fa-magnifying-glass"></i></a>
          </div>
        </div>
        <div class="p-4 overflow-auto">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">DNI</th>
                <th scope="col">Paciente</th>
                <th scope="col">Estado</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Medico</th>
                <th scope="col">Consultorio</th>
                <th scope="col"j colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($cita as $info){
              ?>

              <tr>
                <td scope="row"><?php echo $info->idCita?></td>
                <td><?php echo $info->citFecha?></td>
                <td><?php echo $info->citHora?></td>
                <td><?php echo $info->paciIdentificacion?></td>
                <td><?php echo $info->pacNombres?></td>
                <td><?php echo $info->citEstado?></td>
                <td><?php echo $info->citObservaciones?></td>
                <td><?php echo $info->medNombres?></td>
                <td><?php echo $info->conNombre?></td>
                <td>
                  <a href="v_editarCitas.php?codigo=<?php echo $info->idCita; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href="../controlador/c_eliminarCitas.php?codigo=<?php echo $info->idCita; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
                </td>
              </tr>

              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Formulario -->
    <div class="col-lg-3 col-xl-3 col-auto">
      <div class="card">
        <div class="card-header">
          Registrar Cita
        </div>
        <form action="/controlador/c_registrarCitas.php" class="p-4" method="POST">
          <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Hora:</label>
            <input type="time" class="form-control" name="hora" required>
          </div>
          <div class="mb-3">
            <label class="form-label">N° Identificaicon De Paciente:</label>
            <input type="number" class="form-control" name="identificacion" required>
          </div>
          <div class="mb-2">Medico:</div>
          <select class="form-select mb-3" aria-label="Default select example" name="medico">
            <option selected disabled>Selecciona un medico...</option>
            <!-- Lista Select Medicos -->
            <?php
              foreach($medico as $infMedico){
            ?>

            <option value="<?php echo $infMedico['idMedico']?>"><?php echo $infMedico['medNombres']?></option>

            <?php
            }
            ?>
          </select>
          <div class="mb-2">Consultorio:</div>
          <select class="form-select mb-3" aria-label="Default select example" name="consultorio">
            <option selected disabled>Selecciona un consultorio...</option>
            <!-- Lista Select Consultorios -->
            <?php
              foreach($consultorio as $infCons){
            ?>

            <option value="<?php echo $infCons['idConsultorio']?>"><?php echo $infCons['conNombre']?></option>

            <?php
            }
            ?>
          </select>
          <div class="input-group">
            <div class="me-3">
              Estado:
            </div>
            <div class=" mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">Asignado</label>
              <input class="form-check-input" type="radio" name="estado" value="Asignado" id="inlineRadio1" required>
            </div>
            <div class="mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio2">Atendido</label>
              <input class="form-check-input" type="radio" name="estado" value="Atendido" id="inlineRadio2">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="mb-2">Observaciones:</label>
            <textarea class="form-control mb-3" id="" rows="3" name="observaciones"></textarea>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>